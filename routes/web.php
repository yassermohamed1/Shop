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

// Group Category - > prefix - >name foreach route
//subcategories


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/Cart', [CartController::class, 'index'])->name('cart.index');
Route::put('/Cart/{id}', [CartController::class, 'update'])->name('Cart.update');
Route::post('/Cart/store', [CartController::class, 'store'])->name('Cart.store');
Route::delete('/Cart/{id}', [CartController::class, 'destroy'])->name('Cart.destroy');


Route::get('checkout', [CheckoutController::class, 'create'])
    ->name('checkout.show');   // للعرض

Route::post('checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');
require __DIR__ . '/auth.php';
// Route::resource('users', UserController::class);
// Route::resource('roles', RoleController::class);


// Route::get('/categories/trash', [CategoryController::class, 'trash'])
//     ->name('categories.trash');

// Route::put('/categories/{id}/restore', [CategoryController::class, 'restore'])
//     ->name('categories.restore');

// Route::delete('/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])
//     ->name('categories.forceDelete');


// Route::prefix('categories')->group(function () {

//     Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
//     Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');

//     // ⚠️ لازم قبل /{id}
//     Route::get('/{category}/edit', [CategoryController::class, 'showupdate'])
//         ->name('categories.edit');

//     Route::get('/{category}', [CategoryController::class, 'show'])
//         ->name('categories.show');

//     Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
//     Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
//     Route::delete('/{category}', [CategoryController::class, 'delete'])->name('categories.delete');
// });

// Route::prefix('sub-subcategories')->group(function () {
//     Route::get('/', [SubSubcategoryController::class, 'index'])->name('sub-subcategories.index');
//     Route::get('/{id}', [SubSubcategoryController::class, 'show'])->name('sub-subcategories.show');
//     Route::post('/', [SubSubcategoryController::class, 'create'])->name('sub-subcategories.create');
//     Route::put('/{id}', [SubSubcategoryController::class, 'update'])->name('sub-subcategories.update');
// });


Route::prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/{id}', [ProductController::class, 'show'])
        ->name('products.show');

    Route::get('/{id}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/{id}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/{id}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
});

// Users
// Route::prefix('users')->group(function () {
//     Route::get('/', [UserController::class, 'index'])->name('users.index');
//     Route::get('/create', [UserController::class, 'create'])->name('users.create');
//     Route::post('/', [UserController::class, 'store'])->name('users.store');
//     Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
//     Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
//     Route::delete('/{id}', [UserController::class, 'delete'])->name('users.delete');
// });

// Roles
// Route::prefix('roles')->group(function () {
//     Route::get('/', [RoleController::class, 'index'])->name('roles.index');
//     Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
//     Route::post('/', [RoleController::class, 'store'])->name('roles.store');
//     Route::get('/{id}', [RoleController::class, 'show'])->name('roles.show');
//     Route::put('/{id}', [RoleController::class, 'update'])->name('roles.update');
//     Route::delete('/{id}', [RoleController::class, 'delete'])->name('roles.delete');
// });
