<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProfileController;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::resource('products',ProductController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('userProfile',UserProfileController::class);
    Route::get('order/{orderId}',[UserProfileController::class,'show'])->name('orders.show');
});

Route::post('logout', [UserProfileController::class, 'logout'])->name('logout');


Route::get('/contact', function () {
    return view('user_view.shared.contact');
})->name('contact');

Route::get('/about', function () {
    return view('user_view.shared.about');
})->name('about');

Route::get('/blog', function () {
    return view('user_view.shared.blog');
})->name('blog');

Route::get('/shoping_cart', function () {
    return view('user_view.cart.shoping_cart');
})->name('shoping_cart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
