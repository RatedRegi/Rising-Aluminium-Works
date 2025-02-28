@extends('layouts.app')

@section('title', 'Order Details')

@section('content')

<div class="container mt-5 mb-4">
    <h1 class="mb-4">Order Details</h1>

    <!-- Order Summary -->
    @if($orders->count())
    @foreach ($orders as $order)
    <div class="card mb-4">
      
        <div class="card-header">
            <strong>Order ID: #{{ $order->id }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y, g:i a') }}</p>
        </div>
      
    </div>

    <!-- Order Items -->
    <div class="card mb-5">
        <div class="card-header">
            <strong>Order Items</strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endforeach
    @else
    <p class="text-muted">No order available!</p>
@endif
</div>

@endsection
