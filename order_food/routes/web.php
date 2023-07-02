<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Category;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories'])->name('collections');
// Route::get('/collections/{category_name}', [App\Http\Controllers\Frontend\FrontendController::class, 'products'])->name('collections.products');
Route::get('/collections/{category_name}/{product_name}', [App\Http\Controllers\Frontend\FrontendController::class, 'products'])->name('collections.products');

Route::get('/collections/{category_name}/{product_name}', [App\Http\Controllers\Frontend\FrontendController::class, 'productsview'])->name('collections.products');



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);


//category Route
 Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
    Route::get('/category', 'index');
    Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.category');
    Route::get('category/create','create')->name('create');
    Route::post('category','store')->name('category.store');
    // Route::get('admin/category/{category}/edit', 'App\Http\Controllers\Admin\CategoryController@edit')->name('admin.category.edit');
    Route::get('admin/category/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('admin/category/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');


 });


 // products
 Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');

    // Route::get('/products', 'index');
    Route::get('admin/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products','store');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/product-image/{product_image_id}/delete', [App\Http\Controllers\Admin\ProductController::class, 'destroyImage'])->name('admin.product-image.delete');
    Route::get('/products/{product}/delete', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.product.delete');


});






});
