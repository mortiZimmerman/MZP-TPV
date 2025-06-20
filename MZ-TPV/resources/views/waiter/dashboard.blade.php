@include('waiter.partials.header')
<link rel="stylesheet" href="{{ asset('css/waiterDashboard.css') }}">
<body>
<div id="loader-bg" style="
        position:fixed;z-index:9999;inset:0;background:#fff;display:flex;align-items:center;justify-content:center;
        transition:opacity .4s;
    ">
        <img src="https://res.cloudinary.com/dandumvvy/image/upload/v1750285793/logo_para_loop_aadtyw.png"
             alt="Cargando..." style="width:90px;animation:spin 1.6s linear infinite;">
    </div>
    <main>
        <h1>Waiter Dashboard</h1>
        <h2>Welcome {{ auth()->user()->name }}!</h2>

        <section class="quick-actions">
            <a href="{{ route('tables.index') }}">
                <div class="action" title="manage tables">
                    <img src="https://res.cloudinary.com/dandumvvy/image/upload/v1749671180/pzmpz/xzz7u3ysxeiqfyyv5owz.png" alt="manage tables" class="dashBoardButtonImage"/>
                    <span>Manage tables</span>
                </div>
            </a>

            <a href="{{ route('orders.index') }}">
                <div class="action" title="Manage Orders">
                    <img src="https://res.cloudinary.com/dandumvvy/image/upload/v1750416351/ChatGPT_Image_20_jun_2025_12_44_49_djcsuz.png" alt="Manage Orders" class="dashBoardButtonImage"/>
                    <span>Manage Orders</span>
                </div>
            </a>
        </section>

        <section class="management">
        
            <p>Manage your orders</p>
            <button>Add Order</button>

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
