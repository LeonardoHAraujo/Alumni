<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LeadController;

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
Route::post('/autenticate', [AuthController::class, 'autenticate'])->name('autenticate');

Route::middleware(['auth'])->group(function() {

    # USERS LEVEL
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
    Route::get('/students', [HomeController::class, 'students'])->name('students');

    # PAGE PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/updateProfile', [ProfileController::class, 'update'])->name('updateProfile');

    # PAGE LEADS
    Route::get('/leads', [LeadController::class, 'index'])->name('leads');
    

    # SECTION MAIN SETTINGS
    Route::get('/users', [SettingsController::class, 'users'])->name('users');
    Route::get('/deletedUsers', [SettingsController::class, 'deletedUsers'])->name('deletedUsers');

    # ROUTE OF THE CRUD USERS
    Route::post('/createUsers', [SettingsController::class, 'create']);
    Route::post('/updateUsers', [SettingsController::class, 'update']);
    Route::post('/deleteUsers', [SettingsController::class, 'delete']);

    # ROUTE OF THE UPDATE DELETED USERS
    Route::post('/reactivateUsers', [SettingsController::class, 'updateReactivateUser']);

    # ROUTE LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
