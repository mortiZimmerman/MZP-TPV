@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Table {{ $table->number }}</h1>
    <p>Status: {{ ucfirst($table->status) }}</p>
    <h2>Orders</h2>
    <ul class="list-group">
        @foreach($table->orders as $order)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Order #{{ $order->id }} - €{{ $order->total }} - {{ ucfirst($order->status) }}</span>
                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">Details</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('tables.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection