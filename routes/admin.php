<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ums\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	
	Route::group(['prefix' => 'admin'], function(){
		Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
		
	});
});