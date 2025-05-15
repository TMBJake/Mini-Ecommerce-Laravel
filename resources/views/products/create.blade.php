@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Product</h1>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        @include('products.form')
        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
</div>
@endsection
