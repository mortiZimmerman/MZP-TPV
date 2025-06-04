<link rel="stylesheet" href="{{ asset('css/headerLayout.css') }}">
<header>
    <div><strong>Sistema TPV para Bares y Restaurantes</strong></div>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
        <a href="{{ route('admin.products.index') }}">Manage Products</a>
        <a href="#">Manage Tables</a>
        <a href="#">Manage Orders</a>
    </nav>
</header>