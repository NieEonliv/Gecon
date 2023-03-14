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
    Route::post('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search.post');
});

Route::middleware(\App\Http\Middleware\StandartMiddleware::class)->group(function () {
    Route::patch('/profile/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
    Route::patch('/profile/{id}/photo', [\App\Http\Controllers\UserController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::post('/curses/{id}', [\App\Http\Controllers\CourseController::class, 'enroll'])->name('course.enroll');
    Route::get('/curses/{id}/modules', [\App\Http\Controllers\CourseController::class, 'show'])->name('course.show');
    Route::get('/curses/{id}/modules/occupation/{occupation}', [\App\Http\Controllers\OccupationController::class, 'index'])->name('occupation.index');
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('user.index');

    Route::get('/teaching', [\App\Http\Controllers\TeachingController::class, 'index'])->name('index.teacher');
    Route::get('/teaching/add', [\App\Http\Controllers\TeachingController::class, 'verified'])->name('verified.teacher');

    Route::middleware(\App\Http\Middleware\TeacherMiddleware::class)->group(function () {
        Route::get('/teaching/course', [\App\Http\Controllers\TeachingController::class, 'course'])->name('course.teacher');
        Route::get('/teaching/course/{id}', [\App\Http\Controllers\TeachingController::class, 'lowshow'])->name('course.lowshow.teacher');
        Route::get('/teaching/student', [\App\Http\Controllers\TeachingController::class, 'student'])->name('student.teacher');
        Route::get('/student/{id}', [\App\Http\Controllers\TeachingController::class, 'studentShow'])->name('student.teacher.show');
        Route::delete('/student/{id}', [\App\Http\Controllers\TeachingController::class, 'studentDelete'])->name('student.teacher.delete');

        Route::delete('/curses/{id}/delete', [\App\Http\Controllers\CourseController::class, 'destroy'])->name('destroy.course');
        Route::patch('/curses/{id}/updatelow', [\App\Http\Controllers\CourseController::class, 'updatelow'])->name('update.low.course');
        Route::get('/curses/{id}/update', [\App\Http\Controllers\CourseController::class, 'edit'])->name('edit.course');

        Route::post('/teaching/search/course', [\App\Http\Controllers\CourseController::class, 'searchCourseTeaching'])->name('teaching.course.search');
        Route::post('/teaching/search/student', [\App\Http\Controllers\CourseController::class, 'searchStudentTeaching'])->name('teaching.student.search');

        Route::get('/teaching/register-course', [\App\Http\Controllers\CourseController::class, 'get_create'])->name('course.create');
        Route::post('/teaching/post-course', [\App\Http\Controllers\CourseController::class, 'store'])->name('teaching.create.course');

        Route::post('/create/module/for/{id}', [\App\Http\Controllers\ModuleController::class, 'store'])->name('module.create');
        Route::get('/create/{idcourse}/module/for/{idmodule}', [\App\Http\Controllers\ModuleController::class, 'create'])->name('module.get');
        Route::get('/create/{idcourse}/occupation/{idoccupation}', [\App\Http\Controllers\ModuleController::class, 'editOccupatio'])->name('occupation.get');
        Route::patch('/create/module/{id}/update', [\App\Http\Controllers\ModuleController::class, 'update'])->name('module.update');
    });
});
