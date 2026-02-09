<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeJoiningController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(
    function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'validateLogin'])->name('validateLogin');
        // Route::get("/register", [AuthController::class, 'register'])->name('register');
        // Route::post("/register", [AuthController::class, 'validateRegister'])->name('validateRegister');
        Route::get('/logout', [AuthController::class, 'logout']);
    }
);

Route::middleware('auth')->group(
    function () {
        Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::resource('roles', RoleController::class)->only(['index', 'show'])
            ->middleware('can:viewAny, App\Models\Role');
        Route::resource('users', UserController::class)
            ->middleware('can:viewAny, App\Models\User');
        Route::post(
            '/users/{user}/reset-password',
            [UserController::class, 'resetPassword']
        )->name('users.reset-password');

        Route::get('/onboardings', [EmployeeJoiningController::class, 'index'])->name('onboardings.index');
        Route::get('/onboardings/create', [EmployeeJoiningController::class, 'create'])->name('onboardings.create');
        Route::post('/onboardings/store', [EmployeeJoiningController::class, 'store'])->name('onboardings.store');
        Route::get('/onboardings/{employeeJoining}/preview', [EmployeeJoiningController::class, 'preview'])
            ->name('onboardings.preview');
        Route::get('/onboardings/{employeeJoining}/pdf', [EmployeeJoiningController::class, 'pdf'])
            ->name('onboardings.pdf');
    }
);
