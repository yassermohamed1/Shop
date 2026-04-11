<?php

// use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ImportProductsController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PaymentController;
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

// require __DIR__ . '/auth.php';
Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
Route::get('/categories/trash', [CategoriesController::class, 'trash'])
    ->name('categories.trash');
Route::put('categories/{category}/restore', [CategoriesController::class, 'restore'])
    ->name('categories.restore');
Route::delete('categories/{category}/force-delete', [CategoriesController::class, 'forceDelete'])
    ->name('categories.force-delete');
Route::get('products/import', [ImportProductsController::class, 'create'])
    ->name('products.import');
Route::post('products/import', [ImportProductsController::class, 'store']);
Route::resources([
    'products' => ProductsController::class,
    'categories' => CategoriesController::class,
    'roles' => RolesController::class,
    'users' => UsersController::class,
    'admins' => AdminsController::class,
]);

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
    Route::get('orders/{order}/pay', [PaymentController::class, 'create'])
        ->name('orders.payments.create');
    Route::post('orders/{order}/stripe/paymeny-intent', [PaymentController::class, 'createStripePaymentIntent'])
        ->name('stripe.paymentIntent.create');

    Route::get('orders/{order}/pay/stripe/callback', [PaymentController::class, 'confirm'])
        ->name('stripe.return');
});
require __DIR__ . '/dashboard.php';
