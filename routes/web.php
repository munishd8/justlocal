<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Posts\CategoryController;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\DeathNoticeController;
use App\Http\Controllers\Admin\DirectoryListings\DirectoryListingController;
use App\Http\Controllers\Admin\DirectoryListings\DirectoryListingCategoryController;
use App\Http\Controllers\Admin\LocalEatsController;
use App\Http\Controllers\Admin\PlanningApplicationController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Livewire\ProfileWire;
use App\Http\Controllers\Admin\DirectoryListings\DirectoryListingLocationController;

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
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
        Route::get('posts', [PostController::class,'index'])->name('posts.index');
                Route::get('posts/create', [PostController::class,'create'])->name('posts.create');
                Route::get('posts', [PostController::class,'index'])->name('posts.index');
                Route::get('posts/trash', [PostController::class,'trash'])->name('posts.trash');
                Route::get('posts/{id}/edit', [PostController::class,'edit'])->name('posts.edit');
    Route::get('posts/category', [CategoryController::class,'index'])->name('posts.category.index');
    Route::get('posts/category/{id}/edit', [CategoryController::class,'edit'])->name('posts.category.edit');

    Route::get('profile', ProfileWire::class)->name('profile.index');
    Route::get('death-notices/trash', [DeathNoticeController::class,'trash'])->name('death-notices.trash');
    Route::resource('death-notices', DeathNoticeController::class);

    Route::get('directory-listings/location', [DirectoryListingLocationController::class,'index'])->name('directory-listings.location.index');
    Route::get('directory-listings/location/{id}/edit', [DirectoryListingLocationController::class,'edit'])->name('directory-listings.location.edit');
    Route::get('directory-listings/category', [DirectoryListingCategoryController::class,'index'])->name('directory-listings.category.index');
    Route::get('directory-listings/category/{id}/edit', [DirectoryListingCategoryController::class,'edit'])->name('directory-listings.category.edit');
    Route::get('directory-listings/trash', [DirectoryListingController::class,'trash'])->name('directory-listings.trash');
    Route::resource('directory-listings', DirectoryListingController::class);

    Route::get('restaurants/trash', [RestaurantsController::class,'trash'])->name('restaurants.trash');
    Route::resource('restaurants', RestaurantsController::class);

    Route::get('planning-applications/trash', [PlanningApplicationController::class,'trash'])->name('planning-applications.trash');
    Route::resource('planning-applications', PlanningApplicationController::class);

    Route::get('local-eats/trash', [LocalEatsController::class,'trash'])->name('local-eats.trash');
    Route::resource('local-eats', LocalEatsController::class);

    Route::get('transports/trash', [TransportController::class,'trash'])->name('transports.trash');
    Route::resource('transports', TransportController::class);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
