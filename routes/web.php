<?php

use App\Http\Controllers\DesignationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PwdController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkStatusController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('/home', HomeController::class)->only('index');
    Route::resource('/role', RoleController::class)->except('show');
    Route::resource('/designation', DesignationController::class)->except('show');
    Route::resource('/relationship', RelationshipController::class)->except('show');
    Route::resource('/workstatus', WorkStatusController::class)->except('show');
    Route::resource('/location', LocationController::class)->except('show');
    Route::resource('/user', UserController::class);
    Route::post('/user/{user}/reset-pwd', [UserController::class, 'resetPwd'])->name('user.reset-pwd');

    Route::prefix('/pwd')->name('pwd.')->group(function () {
        Route::get('/change', [PwdController::class, 'change'])->name('change');
        Route::post('/save', [PwdController::class, 'save'])->name('save');
    });
});

Route::resource('/test', TestController::class)->only('index');


Route::get('/', function () {
    return redirect()->route('home.index');
});

Route::get('/pwd', function () {
    return redirect()->route('home.index');
});

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
    'confirm' => false,
]);
