@extends('layouts.app')
@include('waiter.partials.header')

@section('content')
<div class="user-management-container">
    <aside class="sidebar">
        <h2>Waiter Panel</h2>
        <ul class="nav">
            <li>
                <a href="{{ route('waiter.dashboard') }}">
                    🏠 Waiter Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('tables.index') }}">
                    🍽️ Manage Tables
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}">
                    🧾 Manage Orders
                </a>
            </li>
        </ul>
    </aside>
    <section class="user-management">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p>This is your waiter dashboard. Use the menu to manage tables and orders.</p>
    </section>
</div>
@endsection
