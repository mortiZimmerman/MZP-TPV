<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
 <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
</head>
<body>
    <header>
        <div><strong>Sistema TPV para Bares y Restaurantes</strong></div>
        <nav>
            <a href="#">Dashboard Admin</a>
            <a href="#">Manage Products</a>
            <a href="#">Manage Tables</a>
            <a href="#">Manage Orders</a>
        </nav>
    </header>

    <main>
        <h1>Administrator Dashboard</h1>
        <h2>Add products and manage employees</h2>

        <section class="quick-actions">
            <div class="action" title="Manage Products">
                <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/stocks_aozyge.png" alt="Manage Products" class="dashBoardButtonImage"/>
                <span>Manage Products</span>
            </div>
            <div class="action" title="Add Waiter">
                <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/waiter_vdciba.png" alt="Add Waiter" class="dashBoardButtonImage"/>
                <span>Add Waiter</span>
            </div>
            <div class="action" title="Manage Users">
                <img src="https://res.cloudinary.com/duhatfjms/image/upload/v1747330641/admin_waiters_btmixj.png" alt="Manage Users" class="dashBoardButtonImage"/>
                <span>Manage Users</span>
            </div>
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
</body>
</html>
