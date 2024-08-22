<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('front.home');
});

Route::view('/shop', 'front.shop')->name('shop');

Route::get('/customer/login', function(){
    return view('front.login');
})->name('customer.login');

Route::get('/customer/register', function(){
    return view('front.register');
})->name('customer.register');



Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    //category
    Route::view('/admin/category', 'admin.category.list-category')->name('category.list');
    Route::view('/admin/category/add', 'admin.category.add-category')->name('category.add');
    Route::view('/admin/category/edit/{id}', 'admin.category.edit-category')->name('category.edit');

    //product

    Route::view('/admin/product', 'admin.product.list-product')->name('product.list');
    Route::view('/admin/product/add', 'admin.product.add-product')->name('product.add');
    Route::view('/admin/product/edit/{id}', 'admin.product.edit-product')->name('product.edit');
    Route::view('/admin/product/size', 'admin.product.size-product')->name('product.size');
    Route::view('/admin/product/color', 'admin.product.color-product')->name('product.color');
    Route::view('/admin/product/number', 'admin.product.number-product')->name('product.number');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
