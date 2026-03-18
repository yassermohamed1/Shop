<?php

// use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ProductController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubSubcategoryController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\SubSubcategoryController;
// use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/{product:slug}', [ProductController::class, 'show'])
        ->name('products.show');

    Route::resource('Cart', CartController::class);

    Route::get('checkout', [CheckoutController::class, 'create'])
        ->name('checkout.show');

    Route::post('checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');
});
