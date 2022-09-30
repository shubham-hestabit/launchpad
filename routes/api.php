<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\LoginController;

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

// Sanctum
Route::middleware('auth:sanctum')->get('/user/passport', function (Request $request) {
    return $request->user();
});

// Passport
Route::middleware('auth:api')->group(function(){
    Route::get('getuser', [UserApiController::class, 'auth']);
});


// User Routes

Route::post('register',  [UserApiController::class, 'create']);

Route::post('login',  [UserApiController::class, 'login']); ////

Route::get('read/{id}',  [UserApiController::class, 'read']);

Route::put('update/{id}',  [UserApiController::class, 'update']);

Route::delete('delete/{id}',  [UserApiController::class, 'destroy']);

// Route::apiResource("user/read", UserApiController::class);

Route::put('assign/{id}',  [AdminApiController::class, 'assign']);

Route::get('reads/{id}',  [AdminApiController::class, 'read']);