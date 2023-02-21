<?php

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
Auth::routes();

Route::get('/', function () {
    return view('home');
});
Route::post('/register/adventure', [\App\Http\Controllers\RegMoreController::class, 'store'])->name('register.adventure');
Route::middleware(\App\Http\Middleware\LowRegistrationMiddleware::class)->group(function () {
    Route::get('/register/adventure', [\App\Http\Controllers\RegMoreController::class, 'index']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(\App\Http\Middleware\StandartMiddleware::class)->group(function () {

}) ;

