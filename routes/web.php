<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class,'home'])->name('home.home');

Route::get('/create-category', [CategoryController::class,'createCategory'])->name('createCategory');
Route::post('/store-category', [CategoryController::class,'storeCategory'])->name('storeCategory');
Route::get('/{id}/edit-category', [CategoryController::class,'editCategory'])->name('editCategory');
Route::post('/{id}/update-category', [CategoryController::class,'updateCategory'])->name('updateCategory');
Route::get('/{id}/detail-category', [CategoryController::class,'showCategory'])->name('showCategory');
Route::get('/{id}/delete',[CategoryController::class,'destroyCategory'])->name('destroyCategory');

Route::get('/list-product',[HomeController::class,'listProduct'])->name('listProduct');
Route::get('/create-product', [HomeController::class,'createProduct'])->name('createProduct');
Route::post('/store-product', [HomeController::class,'storeProduct'])->name('storeProduct');
Route::get('/{id}/edit-product', [HomeController::class,'editProduct'])->name('editProduct');
Route::post('/{id}/update-product', [HomeController::class,'createProduct'])->name('updateProduct');
Route::get('/{id}/detail-product', [HomeController::class,'showProduct'])->name('showProduct');
