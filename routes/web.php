<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------]
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/clr", function () {
    Session::forget('current_user');

    $user = User::where('is_logged_in', '=', true)->update(['is_logged_in' => false]);
});

Route::get('/', [DashboardController::class, 'home'])->name('homePage');

Route::get('/login', [UserController::class, 'showLoginPage'])->name('loginPage');
Route::post('/login', [UserController::class, 'submitLoginInfo'])->name('submitLoginInfo');
Route::get('/logout', [UserController::class, 'logoutUser'])->name('logoutUser');
Route::get('/signup', [UserController::class, 'showRegisterPage'])->name('showRegisterPage');
Route::post('/signup', [UserController::class, 'submitRegInfo'])->name('submitRegInfo');

Route::get('/users/list', [UserController::class, 'listUsers'])->name('listUsers');
Route::get('/users/search', function () {
    return redirect()->route('homePage');
});
Route::post('/users/search', [UserController::class, 'searchAndListUser'])->name('searchAndListUser');
Route::get('/users/list/{callingMethod}', [UserController::class, 'listUsers'])->name('listUsers');
Route::get('/change_pwd', [UserController::class, 'changeActiveUserPassword'])->name('changeActiveUserPassword');
Route::post('/change_pwd', [UserController::class, 'submitActiveUserPasswordChangeForm'])->name('submitActiveUserPasswordChangeForm');
Route::get('/del_all_users', [UserController::class, 'deleteAllUnverifiedUsers'])->name('deleteAllUnverifiedUsers');
Route::get('/user/verify/{id?}/{callingMethod?}', [UserController::class, 'verifyUser'])
    ->where(['id' => '[0-9]+', 'callingMethod' => '[A-Za-z]+'])->name('verifyUser');
Route::get('/user/resetpwd/{id?}/{callingMethod?}', [UserController::class, 'resetUserPassword'])
    ->where(['id' => '[0-9]+', 'callingMethod' => '[A-Za-z]+'])->name('resetUserPassword');
Route::get('/user/deluser/{id?}/{callingMethod?}', [UserController::class, 'deleteOneUser'])
    ->where(['id' => '[0-9]+', 'callingMethod' => '[A-Za-z]+'])->name('deleteOneUser');
Route::get('/user/edituser/{id?}/{callingMethod?}', [UserController::class, 'editUser'])
    ->where(['id' => '[0-9]+', 'callingMethod' => '[A-Za-z]+'])->name('editUser');
Route::post('/user/edituser', [UserController::class, 'submitEditUser'])->name('submitEditUser');

Route::get('/emp/list/{callingMethod?}', [EmployeeController::class, 'listEmp'])->name('listEmp');
Route::post('/emp/search', [EmployeeController::class, 'searchEmp'])->name('searchEmp');
Route::get('/emp/search', function () {
    return redirect()->route('homePage');
});
Route::get('/emp/new', [EmployeeController::class, 'createNewEmployee'])->name('createNewEmployee');
Route::post('/emp/new', [EmployeeController::class, 'submitNewEmpData'])->name('submitNewEmpData');
Route::post('/emp/edit', [EmployeeController::class, 'submitEditedEmployee'])->name('submitEditedEmployee');
Route::get('/emp/edit/{id}/{callingMethod}', [EmployeeController::class, 'editEmpData'])->name('editEmpData');
Route::get('/emp/edit/', function () {
    return redirect()->back();
});

Route::get('/emp/export', [EmployeeController::class, 'exportEmployeeData'])->name('exportEmployeeData');

Route::get('/cal', function () {
    return view('calendar');
});
