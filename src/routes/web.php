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
})->name('/');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::post('/register/adventure', [\App\Http\Controllers\RegMoreController::class, 'store'])->name('register.adventure');
Route::get('/curses/{id}', [\App\Http\Controllers\CourseController::class, 'index'])->name('curse.index');
Route::middleware(\App\Http\Middleware\LowRegistrationMiddleware::class)->group(function () {
    Route::get('/register/adventure', [\App\Http\Controllers\RegMoreController::class, 'index']);
    Route::post('/search',[\App\Http\Controllers\SearchController::class, 'index'])->name('search.post');
});
Route::middleware(\App\Http\Middleware\StandartMiddleware::class)->group(function () {
    Route::patch('/profile/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
    Route::patch('/profile/{id}/photo', [\App\Http\Controllers\UserController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::post('/curses/{id}', [\App\Http\Controllers\CourseController::class, 'enroll'])->name('course.enroll');
    Route::get('/curses/{id}/modules', [\App\Http\Controllers\CourseController::class, 'show'])->name('course.show');
    Route::get('/curses/{id}/modules/occupation/{occupation}', [\App\Http\Controllers\OccupationController::class, 'index'])->name('occupation.index');
    Route::get('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('user.index');
});

