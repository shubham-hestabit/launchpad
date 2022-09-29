<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\StudentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User Routes

Route::post('register',  [UserApiController::class, 'create']);

Route::get('read/{id}',  [UserApiController::class, 'read']);

Route::put('update/{id}',  [UserApiController::class, 'update']);

Route::delete('delete/{id}',  [UserApiController::class, 'destroy']);

// Route::apiResource("users/read", UserApiController::class);



// Student Routes

Route::post('student-api',  [StudentApiController::class, 'create']);

Route::get('student-api/{id}',  [StudentApiController::class, 'read']);

Route::put('student-api/{id}',  [StudentApiController::class, 'update']);

Route::delete('student-api/{id}',  [StudentApiController::class, 'destroy']);