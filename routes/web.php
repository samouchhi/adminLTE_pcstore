<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Categories;
use App\Models\Product;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware(['checkAuth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/products', function () {
        return redirect('/products/laptop');
    });
    Route::get('/products/laptop', [HomeController::class, 'product'])->name('user.products');
    Route::get('/blog', [HomeController::class, 'blog']);
    Route::get('/blogs/{blog}', [HomeController::class, 'blog_details'])->name('user.blogs.detail');
    Route::get('/product/{product}', [HomeController::class, 'details'])->name('user.details');
    Route::get('/products/pc-hardware', [HomeController::class, 'pc_hardware']);
    Route::get('/products/accessories', [HomeController::class, 'accessories']);
});


Auth::routes();



Route::middleware(['AuthAdmin'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/changePassword/{admin}', [AdminController::class, 'changePass'])->name('admin.changePass');
    Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/adminLogin', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::post('/adminAuth', [AdminController::class, 'adminAuth'])->name('admin.auth');

    //resource
    Route::resource('/admin/users', UserController::class)->except(['show']);
    Route::resource('/admin/products', ProductController::class)->except(['show']);
    Route::resource('/admin/admins', AdminController::class)->except(['show']);
    Route::resource('/admin/categories', CategoryController::class)->except(['show']);
    Route::resource('/admin/products', ProductController::class)->except(['show']);
    Route::resource('/admin/blogs', BlogController::class)->except(['show']);

    /// Admin Products Routes
});


// Route::get('/home', [HomeController::class, 'index']);
// Route::get('/', [HomeController::class, 'index']);
// Route::get('/products', [HomeController::class, 'product'])->name('user.products');
// Route::get('/blog', [HomeController::class, 'blog'])->name('user.blog');
// Route::get('/product/{product}', [HomeController::class, 'details'])->name('user.details');
