<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\MailController;

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


// User Routes
Route::post('register',  [UserApiController::class, 'create']);

Route::post('login',  [UserApiController::class, 'login']); 


// Passport token routes
Route::middleware('auth:api')->group(function(){

    Route::get('read/{id}',  [UserApiController::class, 'read']);

    Route::put('update/{id}',  [UserApiController::class, 'update']);

    Route::delete('delete/{id}',  [UserApiController::class, 'destroy']);

    Route::get('/logout', [UserApiController::class, 'logout']);
});


//assign table related routes
Route::put('assign/{main_id}',  [AdminApiController::class, 'assign'])->middleware('auth:api');

Route::get('reads',  [AdminApiController::class, 'read'])->middleware('auth:api');


/////////// test routes--------
Route::get('sendmail', [MailController::class, 'mails']);

Route::get('new/{id}', [MailController::class, 'notify']);