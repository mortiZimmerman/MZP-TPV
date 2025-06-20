@extends('layouts.app')
@if(auth()->user()->role === 'admin')
    @include('admin.partials.header')
@elseif(auth()->user()->role === 'waiter')
    @include('waiter.partials.header')
@endif


@section('content')
<div class="user-management-container">
    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

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
                        <a href="{{ route('orders.edit', $order->id) }}"></a>

                            <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747338290/una_imagen_representativa_y_minimalista_para_configuraci%C3%B3n_uvwudk.png" alt="Edit Icon">
                        </a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
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
