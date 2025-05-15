@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('products.form')

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
