<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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

Route::get('/', [DashboardController::class, 'home'])->name('homePage');

Route::get('/login', [UserController::class, 'showLoginPage'])->name('loginPage');
Route::post('/login', [UserController::class, 'submitLoginInfo'])->name('submitLoginInfo');
Route::get('/logout', [UserController::class, 'logoutUser'])->name('logoutUser');
