<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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
// Route::middleware(['auth'])->group(function () {
Route::get('/create-category', [CategoryController::class,'createCategory'])->name('createCategory');
Route::post('/store-category', [CategoryController::class,'storeCategory'])->name('storeCategory');
Route::get('/{category_id}/edit-category', [CategoryController::class,'editCategory'])->name('editCategory');
Route::post('/{category_id}/update-category', [CategoryController::class,'updateCategory'])->name('updateCategory');
Route::get('/{category_id}/detail-category', [CategoryController::class,'showCategory'])->name('showCategory');
Route::get('/{category_id}/delete',[CategoryController::class,'destroyCategory'])->name('destroyCategory');

Route::get('/list-product',[HomeController::class,'listProduct'])->name('listProduct');
Route::get('/create-product', [HomeController::class,'createProduct'])->name('createProduct');
Route::post('/store-product', [HomeController::class,'storeProduct'])->name('storeProduct');
Route::get('/{id}/edit-product', [HomeController::class,'editProduct'])->name('editProduct');
Route::post('/{id}/update-product', [HomeController::class,'updateProduct'])->name('updateProduct');
Route::get('/{id}/detail-product', [HomeController::class,'showProduct'])->name('showProduct');
Route::get('/{id}/destory-product', [HomeController::class,'destroyProduct'])->name('destroyProduct');

// });
// Route::get('/index', [HomeController::class,'home'])->name('home.home');

Route::get('/cart', [CartController::class,'cart'])->name('cart');
Route::post('/{id}/add-to-cart', [CartController::class,'addToCart'])->name('addToCart');
Route::get('/{id}/checkout-page', [CartController::class,'checkoutPage'])->name('checkOutPage');
Route::get('/{id}/update-qty', [CartController::class,'updateQty'])->name('updateQty');
Route::get('/update-qty-on-page/{id}', [CartController::class,'updateQtyOnPage'])->name('updateQtyOnPage');
Route::post('/{id}/checkout', [CartController::class,'checkout'])->name('checkout');
Route::get('/{id}/delete-cart',[CartController::class,'destroyCart'])->name('deleteCart');

Route::get('transaksi', [CartController::class,'transaksi'])->name('transaksi');
Route::get('{id}/detail-transaksi',[CartController::class,'detailTransaksi'])->name('detailTransaksi');

Route::get('/change-password', function() {
    return view('auth.passwords.change-password');
})->name('editPassword');
Route::post('/update-password', [HomeController::class,'updatePassword'])->name('updatePassword');

Auth::routes();


Route::get('/beranda', [HomeController::class, 'beranda'])->name('beranda');
