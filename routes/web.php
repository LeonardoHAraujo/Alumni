<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;

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

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::post('/autenticate', [HomeController::class, 'autenticate'])->name('autenticate');

Route::middleware(['auth'])->group(function() {

    # USERS LEVEL
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
    Route::get('/students', [HomeController::class, 'students'])->name('students');

    # SECTION MAIN SETTINGS
    Route::get('/users', [SettingsController::class, 'users'])->name('users');

    # ROUTE OF THE CRUD USERS
    Route::post('/createUsers', [SettingsController::class, 'create']);
    Route::post('/deleteUsers', [SettingsController::class, 'delete']);

    # ROUTE LOGOUT
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});
