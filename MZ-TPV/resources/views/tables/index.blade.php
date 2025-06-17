@extends('layouts.app')

@if(auth()->user()->role === 'admin')
    @include('admin.partials.header')
@elseif(auth()->user()->role === 'waiter')
    @include('waiter.partials.header')
@endif
@section('content')


<div class="user-management-container">
    {{-- Sidebar --}}
    <aside class="sidebar">
        <h2>Manage Tables</h2>
        <ul class="nav">
            <li><a href="{{ route('admin.dashboard') }}">🖥️ Admin Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}">👤 User Management</a></li>
            <li><a href="{{ route('admin.products.index') }}">📦 Product Management</a></li>
            <li><a href="{{ route('tables.index') }}">🍽️ Table Management</a></li>
        </ul>
        <div class="add-user">
            <a href="{{ route('tables.create') }}" class="add-user-button">
                ➕ Add New Table
            </a>
        </div>
    </aside>

    {{-- Main table management area --}}
    <section class="user-management">
        <h1>Tables</h1>
        <div class="users-list">
            @forelse($tables as $table)
                <div class="user-entry">
                    <div class="user-info">
                        <div class="entry-image-placeholder">🍽️</div>
                        <div class="entry-text">
                            <strong>Table #{{ $table->id }}</strong><br>
                            <small>Status: 
                                <span class="badge bg-{{ $table->status === 'free' ? 'success' : ($table->status === 'occupied' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($table->status) }}
                                </span>
                            </small>
                            <br>
                            <small>table for: {{ $table->number }} persons</small>
                        </div>
                    </div>
                    <div class="edit-icon">
                        <a href="{{ route('tables.edit', $table->id) }}">
                            <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747338290/una_imagen_representativa_y_minimalista_para_configuraci%C3%B3n_uvwudk.png" alt="Edit Icon">
                        </a>
                        <form action="{{ route('tables.destroy', $table->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this table?');"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete Table"
                                    style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="https://img.icons8.com/ios-glyphs/30/filled-trash.png" alt="Delete icon" />
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No tables found.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="users-list">
            {{ $tables->links() }}
        </div>
    </section>
</div>
@endsection
