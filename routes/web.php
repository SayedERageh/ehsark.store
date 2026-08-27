<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/

Route::view('/من-نحن', 'pages.about')->name('about');
Route::view('/تواصل-معنا', 'pages.contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Shop
|--------------------------------------------------------------------------
*/

Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop.index');

Route::get('/shop/category/{id}', [ShopController::class, 'category'])
    ->name('shop.category');

Route::get('/shop/{id}', [ShopController::class, 'show'])
    ->name('shop.show');
    


Route::get('/الخدمات', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/الخدمات/{slug}', [ServiceController::class, 'show'])
    ->name('services.show');

/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/

Route::view('/checkout', 'checkout')
    ->name('checkout');
Route::get('/المقالات', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/المقالات/{slug}', [PostController::class, 'show'])
    ->name('posts.show');

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');