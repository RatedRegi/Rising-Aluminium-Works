<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MasterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterCardController extends Controller
{
    public function show(Request $request)
    {
      $orderId = $request->query('order_id'); // Assume the order ID is passed as a query parameter
     
      $order = Order::find($orderId);
     
      if (!$order) {
          return redirect()->back()->with('error', 'Order not found.');
      }
  
      return view('mastercard.index', compact('order'));
    }

    public function store(Request $request, $orderId)
    {
        $validatedData = $request->validate([
            'card_number' => ['required', 'digits:12'],
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|min:' . date('Y'),
            'cvv' => ['required', 'digits:3'],
        ]);
        // Fetch the order
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        DB::beginTransaction();

        try {
            // Find the card
            $card = MasterCard::where('card_number', $validatedData['card_number'])
                ->where('month', $validatedData['month'])
                ->where('year', $validatedData['year'])
                ->where('cvv', $validatedData['cvv'])
                ->first();

            if (!$card) {
                return response()->json(['message' => 'Card details do not match'], 404);
            }

            // Check balance
            if ($card->balance < $order->total_price) {
                return response()->json(['message' => 'Insufficient balance'], 400);
            }

            // Deduct balance
            $card->balance -= $order->total_price;
            $card->save();

            // Update order status
            $order->status = 'completed';
            $order->save();

            // Deduct stock for each item in the order
            foreach ($order->items as $item) {
                $item->product->stock -= $item->quantity;
                if ($item->product->stock < 0) {
                    throw new \Exception('Insufficient stock for product: ' . $item->product->name);
                }
                $item->product->save();
            }

            DB::commit();

            return response()->json([
                'message' => 'Payment Successful',
                'remaining_balance' => $card->balance,
                'redirect_url' => route('customerPortal'),
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
