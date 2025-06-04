@extends('layouts.app')
@include('admin.partials.header')

@section('content')
<div class="user-management-container">
    <aside class="sidebar">
        <h2>Manage Users</h2>
        <ul class="nav">
            <li><a href="{{ route('admin.dashboard') }}">🖥️ Admin Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}">👤 User Management</a></li>
            <li><a href="{{ route('admin.products.index') }}">📦 Product Management</a></li>
        </ul>

        
        <div class="add-user">
            <a href="{{ route('admin.users.create') }}" class="add-user-button">
                ➕ Add New User
            </a>
        </div>
    </aside>

    <section class="user-management">
        <h1>Manage users</h1>
       
        <div class="users-list">
            
            @foreach ($users as $user)
            <div class="user-entry">
                <div class="user-info">
                    @if ($user->role === 'admin')
                        <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1748026141/representative_and_minimalist_black_and_white_image_of_a_maitre_mked0y.png" alt="Admin Icon">
                    @elseif ($user->role === 'waiter')
                        <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/waiter_vdciba.png" alt="Waiter Icon">
                    @else
                        <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/waiter_vdciba.png" alt="User Icon">
                    @endif
                    <span>{{ $user->name }}</span>
                </div>

                <div class="edit-icon">
                    <a href="{{ route('admin.users.edit', $user->id) }}">
                        <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747338290/una_imagen_representativa_y_minimalista_para_configuraci%C3%B3n_uvwudk.png" alt="Edit Icon">
                    </a>

                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this user?');"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete User"
                                style="background: none; border: none; padding: 0; cursor: pointer;">
                            <img src="https://img.icons8.com/ios-glyphs/30/filled-trash.png" alt="Delete icon" />
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        @if (isset($editingUser))
        <div class="edit-user-form">
            <h2>Edit Users</h2>
            <form method="POST" action="{{ route('admin.users.update', $editingUser->id) }}">
                @csrf
                @method('PUT')

                <label>Name</label>
                <input type="text" name="name" value="{{ $editingUser->name }}" placeholder="New Name" required>

                <label>New Password</label>
                <input type="password" name="password" placeholder="New Password">

                <label>Role</label>
                <div class="role-buttons">
                    @foreach (['admin', 'waiter'] as $role)
                        <label>
                            <input type="radio" name="role" value="{{ $role }}" {{ $editingUser->role === $role ? 'checked' : '' }}>
                            {{ ucfirst($role) }}
                        </label>
                    @endforeach
                </div>

                <button type="submit">Save Changes</button>
            </form>
        </div>
        @endif
    </section>
</div>
@endsection
