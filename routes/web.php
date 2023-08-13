<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your appphp lication. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function (){
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin');
    Route::resource('productscategories', ProductCategoryController::class);
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::post('/profiles/checkpassword', [PasswordController::class, 'checkpassword'])->name('profiles.checkPassword'); 
    // Corrected route placement
    Route::resource('products', ProductController::class);
    // Route::resource('carts', 'CartController')->only(['index', 'store', 'update', 'destroy']);
    Route::resource('carts', CartController::class);
});
