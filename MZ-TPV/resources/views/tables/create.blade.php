@extends('layouts.app')
@if(auth()->user()->role === 'admin')
    @include('admin.partials.header')
@elseif(auth()->user()->role === 'waiter')
    @include('waiter.partials.header')
@endif
@section('content')
<link rel="stylesheet" href="{{ asset('css/forms.css') }}">

@section('content')
<div class="container">
    <h1>Create Table</h1>
    <form action="{{ route('tables.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="number" class="form-label"></label>
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number') }}" required placeholder="Enter number of clients">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label"></label>
            <select name="status" id="status" class="form-select" required>
                <option value="free" {{ old('status')=='free' ? 'selected' : '' }}>Free</option>
                <option value="occupied" {{ old('status')=='occupied' ? 'selected' : '' }}>Occupied</option>
                <option value="reserved" {{ old('status')=='reserved' ? 'selected' : '' }}>Reserved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
