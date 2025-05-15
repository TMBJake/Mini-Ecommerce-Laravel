@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p><strong>Category:</strong> {{ $product->category }}</p>
    <p><strong>Price:</strong> ${{ $product->price }}</p>
    <p><strong>Stock:</strong> {{ $product->stock_quantity }}</p>
    <p><strong>Description:</strong></p>
    <p>{{ $product->description }}</p>

    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="300" class="mt-3">
    @endif

    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
        @csrf
        <button class="btn btn-success">Add to Cart</button>
    </form>
</div>
@endsection
