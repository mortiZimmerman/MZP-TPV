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

    {{-- Main order management area --}}
    <section class="user-management">
        <h1>Orders</h1>
        <div class="users-list">
            @forelse($orders as $order)
                <div class="user-entry">
                    <div class="user-info">
                        <div class="entry-image-placeholder">🧾</div>
                        <div class="entry-text">
                            <strong>Order #{{ $order->id }}</strong><br>
                            <small>Table: #{{ $order->table ? $order->table->number : '—' }}</small><br>
                            <small>Waiter: {{ $order->user ? $order->user->name : '—' }}</small><br>
                            <small>Status:
                                <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'paid' ? 'success' : 'danger') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </small>
                            <br>
                            <small>Total: €{{ number_format($order->total, 2) }}</small>
                        </div>
                    </div>
                    <div class="edit-icon">
                        <a href="{{ route('admin.orders.edit', $order->id) }}">
                            <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747338290/una_imagen_representativa_y_minimalista_para_configuraci%C3%B3n_uvwudk.png" alt="Edit Icon">
                        </a>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this order?');"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete Order"
                                    style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="https://img.icons8.com/ios-glyphs/30/filled-trash.png" alt="Delete icon" />
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No orders found.</p>
            @endforelse
        </div>
        {{-- Pagination --}}
        <div class="users-list">
            {{ $orders->links() }}
        </div>
    </section>
</div>
@endsection
