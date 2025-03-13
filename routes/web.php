<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Default routes for other views

Route::get('/', function () {
    return redirect('/products');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});

// Resource route for products
Route::resource('/products', ProductController::class);

// Resource route for categories
Route::resource('/categories', CategoryController::class);
