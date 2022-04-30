<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\QuotationsController;

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
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::post('/lookup', [VehiclesController::class, 'generateBarcode'])->name('lookup');
Auth::routes();
Route::get('/scanner', [VehiclesController::class, 'scanQRCode'])->name('scanner');
Auth::routes();
Route::post('/quote', [VehiclesController::class, 'createQuote'])->name('quote');
Auth::routes();
Route::post('/accept', [QuotationsController::class, 'saveQuotation'])->name('accept');
