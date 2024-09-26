<?php

use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Shops\MainShopsController;
use App\Http\Controllers\Shops\ShopsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'w-admin', 'middleware' => ['auth','role:super-admin']], function(){
  
  Route::get('/', function(){
    return view('components.layouts.app');
  })->name('index');

  Route::controller(MainShopsController::class)->group(function () {
    Route::get('/mainshops', 'index')->name('m-index');
    Route::post('/mainshops', 'store')->name('m-store');
    Route::get('/mainshops/{id}', 'edit')->name('m-edit');
    Route::put('/mainshops/{mainShop}', 'update')->name('m-update');
  });

  Route::controller(ShopsController::class)->group(function () {
    Route::get('/shops', 'index')->name('sh-index');
    Route::get('/shops/create', 'create')->name('sh-create');
    Route::post('/shops/create', 'store')->name('sh-store');
    Route::get('/shops/edit/{id}', 'edit')->name('sh-edit');
    Route::put('/shops/edit/{id}', 'update')->name('sh-update');
    Route::delete('/shops/{id}', 'delete')->name('sh-delete');
  });

  Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('cat-index');
    Route::get('/category/create', 'create')->name('cat-create');
    Route::post('/category/create', 'store')->name('cat-store');
    Route::get('/category/edit/{id}', 'edit')->name('cat-edit');
    Route::put('/category/edit/{category}', 'update')->name('cat-update');
    Route::delete('/category/{id}', 'delete')->name('cat-delete');
  });

  Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('p-index');
    Route::get('/products/create', 'create')->name('p-create');
    Route::post('/products/create', 'store')->name('p-store');
    Route::get('/products/edit/{id}', 'edit')->name('p-edit');
  });

 

});

Route::get('/', function () {
  return redirect()->to('/w-admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
