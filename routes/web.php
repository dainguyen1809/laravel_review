<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'storeLogin'])->name('auth.storeLogin');

Route::group(['middleware' => 'admin'], function () {
    Route::resource('courses', CourseController::class)->except([
        'destroy',
    ]);
    Route::resource('students', StudentController::class)->except([
        'destroy',
    ]);
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');


    Route::group(['middleware' => CheckAdmin::class], function () {
        Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
        Route::delete('students/{student}', [CourseController::class, 'destroy'])->name('students.destroy');
    });
});

// Route::group(['prefix' => 'courses', 'as' => 'course.'], function () {
//     Route::get('/', [CourseController::class, 'index'])->name('index');
//     Route::get('/create', [CourseController::class, 'create'])->name('create');
//     Route::post('/create', [CourseController::class, 'store'])->name('store');
//     Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->name('destroy');
//     Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('edit');
//     Route::put('/edit/{course}', [CourseController::class, 'update'])->name('update');
// });