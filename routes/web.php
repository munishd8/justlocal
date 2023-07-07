<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Posts\CategoryController;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\DeathNoticeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'admin.auth.login');

Auth::routes();

Route::group(['middleware' => 'auth', 'as'=> 'admin.'], function() {
    Route::get('dashboard', [DashboardController::Class,'index'])->name('dashboard');
        Route::get('posts', [PostController::class,'index'])->name('posts.index');
                Route::get('posts/create', [PostController::class,'create'])->name('posts.create');
                Route::get('posts', [PostController::class,'index'])->name('posts.index');
    Route::get('posts/category', [CategoryController::class,'index'])->name('posts.category.index');
    Route::resource('death-notices', DeathNoticeController::class);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
