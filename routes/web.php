<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::post('locate', [App\Http\Controllers\GeoLocationAndCurrencyConversionController::class, 'GeoLocateIP'])->name('locate');
Route::get('geolocate', [\App\Http\Controllers\GeoLocationAndCurrencyConversionController::class, 'index'])->name('GeoLocate');
Route::post('ConvertCurrency', [App\Http\Controllers\GeoLocationAndCurrencyConversionController::class, 'ConvertCurrency'])->name('convert');
