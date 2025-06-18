@include('admin.partials.header')
<link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
<body>
<div id="loader-bg" style="
        position:fixed;z-index:9999;inset:0;background:#fff;display:flex;align-items:center;justify-content:center;
        transition:opacity .4s;
    ">
        <img src="https://res.cloudinary.com/dandumvvy/image/upload/v1750285793/logo_para_loop_aadtyw.png"
             alt="Cargando..." style="width:90px;animation:spin 1.6s linear infinite;">
    </div>
    <main>
        <h1>Administrator Dashboard</h1>
        <h2>Add products and manage employees</h2>

        <section class="quick-actions">
            <a href="{{ route('admin.products.index') }}">
                <div class="action" title="Manage Products">
                    <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/stocks_aozyge.png" alt="Manage Products" class="dashBoardButtonImage"/>
                    <span>Manage Products</span>
                </div>
            </a>

            <a href="{{ route('admin.users.create') }}">
                <div class="action" title="Add Waiter">
                    <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/waiter_vdciba.png" alt="Add Waiter" class="dashBoardButtonImage"/>
                    <span>Add Waiter</span>
                </div>
            </a>

            <a href="{{ route('admin.users.index') }}">
                <div class="action" title="Manage Users">
                    <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/admin_waiters_btmixj.png" alt="Manage Users" class="dashBoardButtonImage"/>
                    <span>Manage Users</span>
                </div>
            </a>
        </section>

        <section class="management">
            <h3>Product and Category Management</h3>
            <p>Manage your products efficiently</p>
            <button>Add Product</button>

            <div class="categories">
                <div class="category-card">
                    <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/drinks_nyvuoi.png" alt="Cocktails" class="category-image"/>
                    <h4>Cocktails and drinks</h4>
                    <p>Edit Stock and Price</p>
                </div>
                <div class="category-card">
                    <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/foods_pbgva2.png" alt="Food" class="category-image"/>
                    <h4>Foods</h4>
                    <p>Edit Stock and Price</p>
                </div>
            </div>
        </section>
    </main>
        <script>
    window.addEventListener('load', function(){
        setTimeout(function(){
            document.getElementById('loader-bg').style.opacity = 0;
            setTimeout(function(){
                document.getElementById('loader-bg').style.display = 'none';
            }, 400);
        }, 350); // medio segundo extra para que el fade no sea brusco
    });
    </script>
    <style>
    @keyframes spin { 100% { transform: rotate(360deg);} }
    </style>
</body>
</html>
