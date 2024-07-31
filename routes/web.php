<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

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

Route::get('dashboard', [DashboardController::Class, 'index'])->middleware('auth')->name('dashboard');
// Pelanggan
Route::middleware('pelanggan')->group(function (){
    Route::get('/order',[OrderController::class, 'index'])->name('user.order');
    Route::get('/order/create',[OrderController::class, 'create'])->name('user.order.create');
    Route::post('/order/create',[OrderController::class, 'store'])->name('user.order.create');
    Route::get('/orderCreate/{id}',[OrderController::class, 'getDataforCreate']);

});

Route::post('login', [AuthController::Class, 'auth'])->name('login');
Route::get('login', function () {return view('login');})->middleware('guest')->name('login');
Route::get('logout', [AuthController::Class, 'logout'])->middleware('auth')->name('logout');
