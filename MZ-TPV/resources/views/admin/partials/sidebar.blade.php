<aside class="sidebar">
    <h2>Management</h2>
    <ul class="nav">
        @if(auth()->user()->role === 'admin')
            <li><a href="{{ route('admin.dashboard') }}">🖥️ Admin Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}">👤 User Management</a></li>
            <li><a href="{{ route('admin.products.index') }}">📦 Product Management</a></li>
            <li><a href="{{ route('tables.index') }}">🍽️ Table Management</a></li>
            <li><a href="{{ route('orders.index') }}">
🧾 Order Management</a></li>
        @elseif(auth()->user()->role === 'waiter')
            <li><a href="#">🪑 Waiter Dashboard</a></li>
            <li><a href="{{ route('tables.index') }}">🍽️ Tables</a></li>
            <li><a href="{{ route('orders.index') }}">🧾 Orders</a></li>
        @endif
    </ul>
    <div class="add-user">
        @if(Route::is('admin.products.*'))
            <a href="{{ route('admin.products.create') }}" class="add-user-button">➕ Add New Product</a>
        @elseif(Route::is('tables.*'))
            <a href="{{ route('tables.create') }}" class="add-user-button">➕ Add New Table</a>
        @elseif(Route::is('admin.users.*'))
            <a href="{{ route('admin.users.create') }}" class="add-user-button">➕ Add New User</a>
        @elseif(Route::is('orders.*'))
            <a href="{{ route('orders.create') }}" class="add-user-button">➕ Add New Order</a>
        @endif
    </div>
</aside>
