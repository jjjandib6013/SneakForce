<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

// Public routes
Route::get('/', function () {

    $products = Product::all();


    return view('welcome', compact('products'));
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/collection', [CollectionController::class, 'index'])->name('collection');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Contact form submission (authenticated not required)
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Cart routes (some may require auth if you want only logged-in users to add/remove items)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    // Checkout routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    // Collection creation (only authenticated users)
    Route::get('/collection/create', [CollectionController::class, 'create'])->name('collection.create');
    Route::post('/collection', [CollectionController::class, 'store'])->name('collection.store');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

        Route::post('/orders/cancel', [OrderController::class, 'cancel'])
        ->name('orders.cancel');

    Route::post('/orders/update-status', [OrderController::class, 'updateStatus'])
    ->name('orders.updateStatus');
});

// Dashboard (authenticated + verified)
Route::get('/dashboard', function () {
        $products = Product::all();


    return view('dashboard', compact('products'));

})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes (authenticated)
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Admin dashboard redirect
    Route::get('/', function () {
        return redirect()->route('admin.products.index');
    })->name('admin.dashboard');

    // Admin product management
    Route::resource('/products', ProductController::class)
        ->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);
});

require __DIR__.'/auth.php';