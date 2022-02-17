<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Cms\CategoryController;
use App\Http\Controllers\Cms\ProductController;

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
	$products = \App\Models\Product::all();
    return view('index', compact('products'));
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	
	Route::group(['prefix' => 'backend'], function(){
		Route::resource('category', CategoryController::class);
		Route::resource('product', ProductController::class);
		Route::get('/product/{id}/attributes', [ProductController::class, 'add_attributes'])->name('product.attributes');
		Route::post('/product/{id}/attributes/store', [ProductController::class, 'store_attributes'])->name('product.attributes.store');
		Route::get('/product/attribute/delete/{id}', [ProductController::class, 'attribute_destroy'])->name('product.attribute.destroy');
	});
});