<?php

use App\Http\Controllers\Api\v1\Posts\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Controllers\Api\v1\DeathNotice\DeathNoticeController;
use App\Http\Controllers\Api\v1\Posts\CategoryController as PostCategoryController;
use App\Http\Controllers\Api\v1\DirectoryListing\CategoryController as DirectoryListingCategoryController;
use App\Http\Controllers\Api\v1\DirectoryListing\DirectoryListingController;
use App\Http\Controllers\Api\v1\DirectoryListing\LocationController;
use App\Http\Controllers\Api\v1\LocalEat\LocalEatController;
use App\Http\Controllers\Api\v1\PlanningApplication\PlanningApplicationController;
use App\Http\Controllers\Api\v1\Restaurants\RestaurantsController;
use App\Http\Controllers\Api\v1\Transports\TransportController;

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

    //Post Routes
Route::get('posts/categories', PostCategoryController::class);
Route::get('posts', [PostController::class,'index']);

//Directory Listings Routes
Route::get('directory-listings/categories', DirectoryListingCategoryController::class);
Route::get('directory-listings/locations', LocationController::class);
Route::get('directory-listings', [DirectoryListingController::class,'index']);

//Death Notices Routes
Route::get('death-notices', [DeathNoticeController::class, 'index']);

//Local Eat  Routes
Route::get('local-eats', [LocalEatController::class, 'index']);

//Planning Applications  Routes
Route::get('planning-applications', [PlanningApplicationController::class, 'index']);

//Restaurants   Routes
Route::get('restaurants', [RestaurantsController::class, 'index']);

//Transports   Routes
Route::get('transports', [TransportController::class, 'index']);