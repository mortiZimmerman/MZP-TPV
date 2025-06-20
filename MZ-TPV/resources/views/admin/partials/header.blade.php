<link rel="stylesheet" href="{{ asset('css/headerLayout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminManagement.css') }}">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dandumvvy/image/upload/v1750285793/logo_negro_hggkgw.png">
<header>
    <div><strong> <a href="{{ route('account') }}">My Account</a></strong></div>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
        <a href="{{ route('admin.products.index') }}">Manage Products</a>
        <a href="{{ route('tables.index') }}">Manage Tables</a>
         <a href="{{ route('orders.index') }}">Manage Orders</a>

    </nav>
</header>