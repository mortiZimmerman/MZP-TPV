@extends('layouts.app')

@section('title', 'Product Details')

@include('admin.partials.header')
@section('content')
<div class="container">
    <h1>Product Details</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p><strong>Category:</strong> {{ $product->category ? $product->category->name : '—' }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'No description' }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2, '.', ',') }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
        </div>
    </div>

    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
</div>
@endsection
