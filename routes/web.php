<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationBoardController;
use App\Http\Controllers\EducationStandardController;
use App\Http\Controllers\EmployeeJoiningController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(
    function () {
        // Login Routes
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'validateLogin'])->name('validateLogin');
        // Route::get("/register", [AuthController::class, 'register'])->name('register');
        // Route::post("/register", [AuthController::class, 'validateRegister'])->name('validateRegister');

        // Logout URI sanitisation
        Route::get('/logout', [AuthController::class, 'logout']);
    }
);

Route::middleware('auth')->group(
    function () {
        // Logout Routes
        Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

        // Login Home Page
        Route::get('/', [DashboardController::class, 'index'])->name('home');

        // Master Routes
        // Roles CRUD
        Route::resource('roles', RoleController::class)->only(['index', 'show'])
            ->middleware('can:viewAny, App\Models\Role');

        // Languages CRUD
        Route::post('languages/{language}/restore', [LanguageController::class, 'restore'])
            ->name('languages.restore');
        Route::resource('languages', LanguageController::class);

        // Education Board CRUD
        Route::post('boards/{board}/restore', [EducationBoardController::class, 'restore'])
            ->name('boards.restore');
        Route::resource('boards', EducationBoardController::class);

        // Education Standard CRUD
        Route::post('standards/{standard}/restore', [EducationStandardController::class, 'restore'])
            ->name('standards.restore');
        Route::resource('standards', EducationStandardController::class);

        // Users Route
        Route::resource('users', UserController::class)
            ->middleware('can:viewAny, App\Models\User');
        Route::post(
            '/users/{user}/reset-password',
            [UserController::class, 'resetPassword']
        )->name('users.reset-password');

        // Onboarding Component Routes
        Route::get('/onboardings', [EmployeeJoiningController::class, 'index'])->name('onboardings.index');
        Route::get('/onboardings/create', [EmployeeJoiningController::class, 'create'])->name('onboardings.create');
        Route::post('/onboardings/store', [EmployeeJoiningController::class, 'store'])->name('onboardings.store');
        Route::get('/onboardings/{employeeJoining}/preview', [EmployeeJoiningController::class, 'preview'])
            ->name('onboardings.preview');
        Route::get('/onboardings/{employeeJoining}/pdf', [EmployeeJoiningController::class, 'pdf'])
            ->name('onboardings.pdf');
    }
);
