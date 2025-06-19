@extends('layouts.app')

@section('title', 'Create Product')
<link rel="stylesheet" href="{{ asset('css/forms.css') }}">
@include('admin.partials.header')
@section('content')
<div class="container">
    <h1>Create Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label"><span class="text-danger"></span></label>
            <input 
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                placeholder="Product Name"
                required
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label"></label>
            <textarea
                id="description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
                rows="3"
                placeholder="Product Description"
            >{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label"><span class="text-danger"></span></label>
            <input
                type="number"
                id="price"
                name="price"
                class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price') }}"
                step="0.01"
                min="0"
                placeholder="Product Price"
                required
            >
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label"><span class="text-danger"></span></label>
            <input
                type="number"
                id="stock"
                name="stock"
                class="form-control @error('stock') is-invalid @enderror"
                value="{{ old('stock') }}"
                min="0"
                placeholder="Product Stock"
                required
            >
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <div>
    <select name="category_id" id="category_id" class="form-select" required style="flex: 1;">
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="button" id="add-category-btn" class="addCategoryButton">+</button>
</div>
<div id="new-category-box" style="display:none; margin-top:8px; gap:10px; align-items:center;">
    <input type="text" id="new-category-input" class="form-control" placeholder="New category name" maxlength="50" style="flex:1; min-width:0; margin-right:0;">
    <button type="button" id="confirm-add-category" class="btn btn-success" style="min-width:80px;">Add</button>
    <button type="button" id="cancel-add-category" class="btn btn-secondary" style="min-width:80px;">Cancel</button>
</div>


@push('scripts')
<script>
document.getElementById('add-category-btn').onclick = function() {
    document.getElementById('new-category-box').style.display = 'block';
    document.getElementById('new-category-input').focus();
};
document.getElementById('cancel-add-category').onclick = function() {
    document.getElementById('new-category-box').style.display = 'none';
    document.getElementById('new-category-input').value = '';
};
document.getElementById('confirm-add-category').onclick = async function() {
    let name = document.getElementById('new-category-input').value.trim();
    if(!name) return alert('Category name required');
    let token = document.querySelector('meta[name="csrf-token"]').content;
    let res = await fetch('{{ route('categories.store') }}', {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': token, 'Accept':'application/json'},
        body: JSON.stringify({ name })
    });
    if(res.ok) {
        let data = await res.json();
        let select = document.getElementById('category_id');
        let option = document.createElement('option');
        option.value = data.id;
        option.textContent = data.name;
        select.appendChild(option);
        select.value = data.id;
        document.getElementById('new-category-box').style.display = 'none';
        document.getElementById('new-category-input').value = '';
        alert('Category created');
    } else {
        alert('Error creating category');
    }
};
</script>
@endpush


        <button type="submit" class="btn-success">Save Product</button>
        <a href="{{ route('admin.products.index') }}" ><button type="button" class="btn-cancel">Cancel</button></a>
       
    </form>
</div>
@endsection
