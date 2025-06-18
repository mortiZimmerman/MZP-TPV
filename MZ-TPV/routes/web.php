<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OtherController;

// Redirección por defecto
Route::redirect('/', '/login');

// Rutas autenticadas
Route::middleware(['auth'])->group(function () {

    // DASHBOARD y PROFILE (solo admin dashboard)
    Route::get('/dashboard', function () {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('login');
        }
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTAS SOLO ADMIN (admin dashboard y gestión)
    Route::prefix('admin')
         ->middleware(AdminMiddleware::class)
         ->name('admin.')
         ->group(function () {
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');

            Route::resource('users', UserController::class);
            Route::resource('products', ProductController::class);
            Route::resource('orders', OrderController::class); // <-- Orders también aquí
         });

    // RUTAS SOLO CAMARERO (waiter)
    Route::prefix('waiter')
        ->middleware('role:waiter')
        ->name('waiter.')
        ->group(function () {
            Route::resource('orders', OrderController::class)->only([
                'index', 'show', 'edit', 'update', 'create', 'store'
            ]);
        });

});

// Otras rutas (extra)
Route::get('/admin/other', [OtherController::class, 'index'])
    ->middleware(['auth', AdminMiddleware::class])
    ->name('admin.someOtherPage');

require __DIR__.'/auth.php';

Route::get('/account', function() {
    return view('account');
})->name('account');

// Rutas públicas de mesas (si lo necesitas)
use App\Http\Controllers\TableController;
Route::resource('tables', TableController::class);
