<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail-product');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categori-all');
Route::get('/categories/{categori}', [CategoriesController::class, 'index'])->name('categori-product');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// dashboard admin
Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('product', ProductController::class);
    Route::resource('categori', CategoriController::class);
    Route::resource('account', AccountController::class);
    Route::get('product-gallery/{id}', [ProductController::class ,'deleteGallery'])->name('product_gallery.delete');
});
Auth::routes();
