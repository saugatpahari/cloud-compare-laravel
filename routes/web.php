<?php

if (App::environment('production')) {
    URL::forceScheme('https');
}

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AzurePriceController;
use App\Http\Controllers\AwsPriceController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\GooglePriceController;
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

Route::get('/azure-price-store', [AzurePriceController::class,'index'])->name('azure_price_store');
Route::get('/aws-price-store', [AwsPriceController::class,'index'])->name('aws_price_store');
Route::get('/google-price-store', [GooglePriceController::class,'index'])->name('google_price_store');
Route::post('/compare-price-show', [CalculatorController::class,'index'])->name('compare_price_show');
