@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Table {{ $table->number }}</h1>
    <form action="{{ route('tables.update', $table) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="number" class="form-label"></label>
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $table->number) }}" required placeholder="Enter number of clients">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label"></label>
            <select name="status" id="status" class="form-select" required>
                <option value="free" {{ (old('status', $table->status) == 'free') ? 'selected' : '' }}>Free</option>
                <option value="occupied" {{ (old('status', $table->status) == 'occupied') ? 'selected' : '' }}>Occupied</option>
                <option value="reserved" {{ (old('status', $table->status) == 'reserved') ? 'selected' : '' }}>Reserved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tables.index') }}" ><button type="button" class="btn-cancel">Cancel</button></a>
    </form>
</div>
@endsection
