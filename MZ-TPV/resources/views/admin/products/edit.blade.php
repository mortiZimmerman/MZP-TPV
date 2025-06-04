@extends('layouts.app')

@section('title', 'Edit Product')
@include('admin.partials.header')
@section('content')
<div class="container">
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input 
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $product->name) }}"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                id="description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
                rows="3"
            >{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price ($) <span class="text-danger">*</span></label>
            <input
                type="number"
                id="price"
                name="price"
                class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price', $product->price) }}"
                step="0.01"
                min="0"
                required
            >
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
            <input
                type="number"
                id="stock"
                name="stock"
                class="form-control @error('stock') is-invalid @enderror"
                value="{{ old('stock', $product->stock) }}"
                min="0"
                required
            >
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
            <select
                id="category_id"
                name="category_id"
                class="form-select @error('category_id') is-invalid @enderror"
                required
            >
                <option value="">-- Select a category --</option>
                @foreach($categories as $id => $name)
                    <option 
                      value="{{ $id }}" 
                      {{ old('category_id', $product->category_id) == $id ? 'selected' : '' }}
                    >
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
