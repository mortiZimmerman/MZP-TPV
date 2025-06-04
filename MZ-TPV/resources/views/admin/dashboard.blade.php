<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
    <style>
        .action {
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .action:hover {
            transform: scale(1.05);
        }

        .quick-actions a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    @include('admin.partials.header')

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
</body>
</html>
