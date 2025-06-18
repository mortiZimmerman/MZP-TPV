@extends('layouts.app')

@include('admin.partials.header')

@section('content')
<div class="user-management-container">
    {{-- Sidebar --}}
    <aside class="sidebar">
        <h2>Manage Orders</h2>
        <ul class="nav">
            <li><a href="{{ route('admin.dashboard') }}">🖥️ Admin Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}">👤 User Management</a></li>
            <li><a href="{{ route('admin.products.index') }}">📦 Product Management</a></li>
            <li><a href="{{ route('admin.orders.index') }}">🧾 Order Management</a></li>
        </ul>
        <div class="add-user">
            <a href="{{ route('admin.orders.create') }}" class="add-user-button">
                ➕ Add New Order
            </a>
        </div>
    </aside>

    <section class="user-management">
        <h1>Create Order</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.orders.store') }}" method="POST" class="user-form">
            @csrf

            <div class="mb-3">
                <label for="table_id" class="form-label">Table</label>
                <select name="table_id" id="table_id" class="form-select" required>
                    <option value="">-- Select Table --</option>
                    @foreach($tables as $table)
                        <option value="{{ $table->id }}" @selected(old('table_id') == $table->id)>
                            Table #{{ $table->number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Waiter</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="">-- Select Waiter --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total (€)</label>
                <input type="number" name="total" id="total" class="form-control" min="0" step="0.01" value="{{ old('total', 0) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending" @selected(old('status') == 'pending')>Pending</option>
                    <option value="paid" @selected(old('status') == 'paid')>Paid</option>
                    <option value="canceled" @selected(old('status') == 'canceled')>Canceled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Order</button>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </section>
</div>
@endsection
