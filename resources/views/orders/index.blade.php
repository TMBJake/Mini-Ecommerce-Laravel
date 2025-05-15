@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Orders</h1>

    @foreach ($orders as $order)
        <div class="card mb-4">
            <div class="card-header">
                <strong>Order #{{ $order->id }}</strong> by {{ $order->name }} | {{ $order->email }}
            </div>
            <div class="card-body">
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Payment:</strong> {{ ucfirst($order->payment_type) }}</p>
                <p><strong>Total:</strong> ${{ $order->total }}</p>
                <hr>
                <h5>Items:</h5>
                <ul>
                    @foreach ($order->items as $item)
                        <li>{{ $item->product_name }} x {{ $item->quantity }} = ${{ $item->price * $item->quantity }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection
