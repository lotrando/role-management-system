<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

// User routes
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Admin route group
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
});