
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Your Cart</h1>
    @if($cart && $cart->items->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <form action="{{ route('cart.clear')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Clear Cart</button>
                        </form>
                    </td>
                    <td></td>
                    <td></td>
                    <td><h4>${{$total}}</h4></td>
                    <td>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Checkout</button>
                        </form>
                    </td>
                </tr>
            </tfoot>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection


