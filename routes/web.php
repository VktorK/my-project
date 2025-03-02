<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\Cart\CartController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user/product/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/categories', [ProfileController::class, 'index'])->name('user.category.index');

    Route::get('/products/index', [ProductController::class,'index'])->name('user.product.index');
    Route::get('/carts/index', [CartController::class,'index'])->name('user.cart.index');
    Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('user.products.edit');
    Route::put('/products/{product}', [ProductController::class,'update'])->name('user.products.update');
    Route::post('/products', [ProductController::class,'store'])->name('user.products.store');
    Route::get('/products/create', [ProductController::class,'create'])->name('user.products.create');
    Route::get('/products/{product}', [ProductController::class,'show'])->name('user.products.show');
    Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('user.products.destroy');

    Route::get('/categories/index', [CategoryController::class,'index'])->name('user.categories.index');

    Route::post('/orders/cart/{product}',[CartController::class,'storeToCart'])->name('orders.cart.store');
    Route::get('/orders/cart/index', [CartController::class,'index'])->name('user.cart.index');

    Route::get('/cart/count', [OrderController::class, 'getCartCount'])->name('cart.count');
    Route::post('/ordersStore', [OrderController::class, 'store'])->name('user.order.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('user.order.index');
    Route::delete('/orders/{order}', [OrderController::class,'destroy'])->name('user.order.destroy');
    Route::get('/orders/{order}/edit', [OrderController::class,'edit'])->name('user.order.edit');
    Route::put('/orders/{order}', [OrderController::class,'update'])->name('user.order.update');


});

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/users/register',[UserController::class,'create'])->name('user.register');
//Route::get('/users/login',[UserController::class,'login'])->name('user.login');
Route::post('/users/login',[UserController::class,'store'])->name('user.store');
Route::post('/logout',[UserController::class,'logout'])->name('user.logout');




require __DIR__.'/auth.php';
