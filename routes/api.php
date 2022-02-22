<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::match(['get','post'],'/kapital/approve/{id}',[App\Http\Controllers\Account\PaymentController::class, 'approveUrl'])->name('approve');
Route::match(['get','post'],'/kapital/decline/{id}',[App\Http\Controllers\Account\PaymentController::class, 'declineUrl'])->name('decline');
Route::match(['get','post'],'/kapital/cancel/{id}',[App\Http\Controllers\Account\PaymentController::class, 'cancelUrl'])->name('cancel');
