<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Shop\MainShopController;
use App\Livewire\Shops\MainShop;
use App\Livewire\Shops\MainShops;
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

Route::get('/', function(){
    return view('welcome');
});

Route::group(['prefix' => 'w-admin', 'middleware' => ['auth','role:sklat']], function(){
    Route::get('/', function () {
       return view('components.layouts.app');
    })->name('index');

    Route::get('/mainshops', MainShops::class);

});

Route::get('/', function () {
    return redirect()->to('/w-admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
