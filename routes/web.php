<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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
})->name('index');

Route::get('storagelink', function () {
    Artisan::call('storage:link');
});

Route::get('register',[InicioController::class , 'register'])->name('register');
Route::post('save',[InicioController::class , 'save'])->name('save');
Route::post('check',[InicioController::class,'check'])->name('check');
Route::post('logout',[InicioController::class , 'logout'])->name('logout');
Route::get('login',[InicioController::class , 'login'])->name('login')->middleware('guest');
Route::get('seller', function (){
    return view('seller.index');
});

Route::get('/stock',[StockController::class, 'index'])->name('stock.index');