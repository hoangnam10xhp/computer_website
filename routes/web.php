<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;

// Route login Admin
Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('admin.login');
Route::post('/', [AdminController::class, 'postloginAdmin'])->name('admin.postlogin');

// Home route
Route::get('/home', function () {
    return view('home');
})->name('home');

// Group routes for admin
Route::prefix('admin')->group(function () {

    // Category routes
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    });

    // Product routes
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    });

    // Banner routes
    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('/update/{id}', [BannerController::class, 'update'])->name('banner.update');
        Route::get('/delete/{id}', [BannerController::class, 'destroy'])->name('banner.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    });

});
