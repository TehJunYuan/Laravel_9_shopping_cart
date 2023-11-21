<?php

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

Route::get('/myProduct', function () {
    return view('detail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//manage product
Route::post('/addProduct/store',[App\Http\Controllers\ProductController::class,'add'])->name('addProduct');
Route::get('/addProduct', [App\Http\Controllers\ProductController::class,'index'])->name('add.Product');
Route::post('/updateProduct', [App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');
Route::get('/editProduct/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('editProduct');
Route::get('/showProduct', [App\Http\Controllers\ProductController::class, 'view'])->name('viewProduct');
Route::get('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('deleteProduct');
Route::get('/productDetail/{id}',[App\Http\Controllers\ProductController::class,'productdetail'])->name('product.detail');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'viewProduct'])->name('products');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'search'])->name('search');

//manage category
Route::get('/addCategory', [App\Http\Controllers\CategoryController::class,'index'])->name('add.Category');
Route::post('/addCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
Route::get('/showCategory', [App\Http\Controllers\CategoryController::class, 'view'])->name('viewCategory');

//cart
Route::post('/addCart', [App\Http\Controllers\CartController::class, 'add'])->name('addCart');
Route::get('/myCart', [App\Http\Controllers\CartController::class, 'showMyCart'])->name('show.my.cart');
Route::get('/cartItem', [App\Http\Controllers\CartController::class, 'cartItem'])->name('cartItem');
Route::get('/deleteCart/{id}',[App\Http\Controllers\CartController::class,'delete'])->name('delete.cart.item');
