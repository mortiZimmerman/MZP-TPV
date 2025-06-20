<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\TableController;

// Default redirect
Route::redirect('/', '/login');

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Dashboard redirection for admin and waiter
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'waiter') {
            return redirect()->route('waiter.dashboard');
        } else {
            return redirect()->route('login');
        }
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes (dashboard, management)
    Route::prefix('admin')
        ->middleware(AdminMiddleware::class)
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');

            Route::resource('users', UserController::class);
            Route::resource('products', ProductController::class);
            // Ya NO pongas resource orders aquí
        });

    // Waiter routes (dashboard)
    Route::prefix('waiter')
        ->name('waiter.')
        ->group(function () {
            Route::get('/dashboard', function () {
                return view('waiter.dashboard');
            })->name('dashboard');
            // Ya NO pongas resource orders aquí
        });

    // Orders management for all authenticated
    Route::resource('orders', OrderController::class);

    // Tables management (admin and waiter)
    Route::resource('tables', TableController::class);
});

// Extra admin page
Route::get('/admin/other', [OtherController::class, 'index'])
    ->middleware(['auth', AdminMiddleware::class])
    ->name('admin.someOtherPage');

require __DIR__.'/auth.php';

Route::get('/account', function() {
    return view('account');
})->name('account');
