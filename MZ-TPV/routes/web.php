<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;  
use Illuminate\Support\Facades\Route;

// Ruta pública para la página principal
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(AdminMiddleware::class)->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->middleware([AdminMiddleware::class])->group(function () {
        Route::resource('users', UserController::class);
    });
});
Route::get('/admin/other', [OtherController::class, 'index'])->name('admin.someOtherPage');
require __DIR__.'/auth.php';
