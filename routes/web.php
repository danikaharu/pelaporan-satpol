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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/reports', App\Http\Controllers\ReportController::class);
    Route::get('/report/export', [App\Http\Controllers\ReportController::class, 'export'])->name('report.export');

    Route::resource('/users', App\Http\Controllers\UserController::class);

    Route::resource('/roles', App\Http\Controllers\RoleController::class);

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', function () {
    return view('auth.login');
});
