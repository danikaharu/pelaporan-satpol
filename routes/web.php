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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/home', [App\Http\Controllers\SurveyEntriesController::class, 'create'])->name('entries.create');
    Route::post('/home', [App\Http\Controllers\SurveyEntriesController::class, 'store'])->name('entries.store');
    Route::get('/survey/{entry}', [App\Http\Controllers\SurveyEntriesController::class, 'show'])->name('entries.show');

    Route::resource('/users', App\Http\Controllers\UserController::class);

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', function () {
    return view('auth.login');
});
