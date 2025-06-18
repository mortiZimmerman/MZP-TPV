{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.app')

@include('admin.partials.header')

@section('content')

<div class="user-management-container">
    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Main product management area --}}
    <section class="user-management">
        <h1>Products</h1>

        <div class="users-list">
            @forelse($products as $product)
                <div class="user-entry">
                    <div class="user-info">
                        {{-- Category image on the left --}}
                        @if($product->category && $product->category->image_url)
                            <img src="{{ $product->category->image_url }}" alt="{{ $product->category->name }}" class="entry-image">
                        @else
                            <div class="entry-image-placeholder">📦</div>
                        @endif
                        <div class="entry-text">
                            <strong>{{ $product->name }}</strong><br>
                            <small>Category: {{ $product->category ? $product->category->name : '—' }}</small>
                        </div>
                    </div>

                    <div class="edit-icon">
                        <a href="{{ route('admin.products.edit', $product->id) }}">
                            <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747338290/una_imagen_representativa_y_minimalista_para_configuraci%C3%B3n_uvwudk.png" alt="Edit Icon">
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this product?');"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete Product"
                                    style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="https://img.icons8.com/ios-glyphs/30/filled-trash.png" alt="Delete icon" />
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="users-list">
            {{ $products->links() }}
        </div>
    </section>
</div>
@endsection
