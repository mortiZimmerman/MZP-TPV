<?php
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\AdminMiddleware;

Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('login');
        }
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')
         ->middleware(AdminMiddleware::class)
         ->name('admin.')
         ->group(function () {
             Route::get('/dashboard', function () {
                 return view('admin.dashboard');
             })->name('dashboard');

             Route::resource('users', UserController::class);
             Route::resource('products', ProductController::class);
         });

    // Aquí añades tus tablas, dentro del middleware 'auth'
    Route::resource('tables', TableController::class);
});

Route::get('/admin/other', [OtherController::class, 'index'])
    ->middleware(['auth', AdminMiddleware::class])
    ->name('admin.someOtherPage');

require __DIR__.'/auth.php';
