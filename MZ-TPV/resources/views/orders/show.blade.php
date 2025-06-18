@extends('layouts.app')
@include('admin.partials.header')

@section('content')
 @include('admin.partials.sidebar')

    <section class="user-management">
        <h1>Order #{{ $order->id }}</h1>
        <div class="card p-4 mb-3">
            <div class="mb-2"><strong>Table:</strong> #{{ $order->table ? $order->table->number : '—' }}</div>
            <div class="mb-2"><strong>Waiter:</strong> {{ $order->user ? $order->user->name : '—' }}</div>
            <div class="mb-2"><strong>Total:</strong> €{{ number_format($order->total, 2) }}</div>
            <div class="mb-2"><strong>Status:</strong> 
                <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'paid' ? 'success' : 'danger') }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
            <div class="mb-2"><strong>Created at:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</div>
            <div class="mb-2"><strong>Last update:</strong> {{ $order->updated_at->format('d/m/Y H:i') }}</div>
        </div>
        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
    </section>
</div>
@endsection
