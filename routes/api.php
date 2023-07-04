<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('auth/logout', [AuthController::class,'logout']);
    Route::post('auth/change-password', [AuthController::class,'changePassword']);

});


  Route::post('auth/login', [AuthController::class,'login']);
  Route::post('auth/register', [AuthController::class,'register']);
  Route::post('auth/verify', [AuthController::class,'verify']);
  Route::post('auth/reset-verify', [AuthController::class,'resetVerify']);
  Route::post('auth/forgot-password', [AuthController::class,'forgotPassword']);
  Route::post('auth/reset-forgot-password', [AuthController::class,'resetForgotPassword']);

    Route::post('auth/new-password', [AuthController::class,'newPassword']);