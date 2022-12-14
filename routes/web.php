<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AssignController;

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
    return view('welcome');
});

Route::view('user-form', 'users');
Route::post('submit-user-form', [MainController::class, 'submitUserData']);

Route::view('student-form', 'students');
Route::post('submit-student-form', [StudentController::class, 'submitStudentData']);

Route::view('teacher-form', 'teachers');
Route::post('submit-teacher-form', [TeacherController::class, 'submitTeacherData']);

Route::get('user-role', [RoleController::class, 'userRole']);
Route::get('submit-assign-form', [AssignController::class, 'assignData']);

Route::view('login-form', 'user_login');
Route::post('user-login-form', [MainController::class, 'loginUser']);

Route::view('user-data', 'userData');
Route::post('user-details', [MainController::class, 'loginUser']);