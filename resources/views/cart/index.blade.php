@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Your Cart</h1>
    
    @if($cart && $cart->items->count())
        <div class="table-responsive">  {{-- Makes table scrollable on small screens --}}
            <table class="table table-bordered">
                <thead class="thead-dark">
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
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm w-50">
                                    <button type="submit" class="btn btn-primary btn-sm ms-2">Update</button>
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
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Clear Cart</button>
                            </form>
                        </td>
                        <td></td>
                        <td></td>
                        <td><h4>${{ number_format($total, 2) }}</h4></td>
                        <td>
                            <form action="{{ route('cart.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Checkout</button>
                            </form>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @else
        <p class="text-muted">Your cart is empty.</p>
    @endif
</div>
@endsection
