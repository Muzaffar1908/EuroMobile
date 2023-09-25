<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/login', function(){
    return view('auth/login');
});

Route::get('/register', function(){
    return view('auth/register');
});

Route::controller(AuthController::class)->group(function(){
   
});

Route::group(['prefix' => 'w-admin', 'middleware' => ['auth', 'role:super-admin']], function(){
       
});
