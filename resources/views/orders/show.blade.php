@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
  
<div class="container my-5">
    <h3>Remember to add your address.</h3>
    <h5>If you haven't, <a href="{{route('customerPortal')}}">add here</a></h5>
</div>
<div class="container my-5">
    <h1 class="mb-4">Order Details</h1>

    <!-- Order Summary -->
    <div class="card mb-4">
        <div class="card-header">
            <strong>Order ID: #{{ $orders->id }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Status:</strong> {{ ucfirst($orders->status) }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($orders->total_price, 2) }}</p>
            <p><strong>Order Date:</strong> {{ $localTime->format('F j, Y, g:i a') }}</p>
        </div>
    </div>
    <!-- Order Items -->
    <div class="card">
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
                    @foreach ($orders->items as $item)
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
</div>
@endsection
