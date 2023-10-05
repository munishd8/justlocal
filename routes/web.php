<?php

use App\Http\Controllers\Admin\ChangePasswordController;
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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RestaurantCategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\Posts\CommentController;

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

// Route::view('/', 'admin.auth.login');
Route::get('/', [LoginController::class,'showLoginForm'])->name('login');

Auth::routes();

Route::get('users',[UserController::class,'export'])->name('users.export');
Route::group(['middleware' => 'auth', 'as'=> 'admin.'], function() {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('subscribers', [SubscriberController::class,'index'])->name('subscribers.index');
        Route::get('posts', [PostController::class,'index'])->name('posts.index');
                Route::get('posts/create', [PostController::class,'create'])->name('posts.create');
                Route::get('comments', [CommentController::class, 'comments'])->name('comments');
                Route::get('posts', [PostController::class,'index'])->name('posts.index');
                Route::get('posts/trash', [PostController::class,'trash'])->name('posts.trash');
                Route::get('posts/export', [PostController::class,'export'])->name('posts.export');
                Route::get('posts/{id}/edit', [PostController::class,'edit'])->name('posts.edit');
    Route::get('posts/category', [CategoryController::class,'index'])->name('posts.category.index');
    // Route::get('posts/category/export', [CategoryController::class,'export'])->name('posts.categories.export');
    Route::get('posts/category/{id}/edit', [CategoryController::class,'edit'])->name('posts.category.edit');

    Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
    Route::get('death-notices/export', [DeathNoticeController::class,'export'])->name('death-notices.export');
    Route::get('death-notices/trash', [DeathNoticeController::class,'trash'])->name('death-notices.trash');
    Route::resource('death-notices', DeathNoticeController::class);

    Route::get('directory-listings/contactInformation/export', [DirectoryListingController::class,'contactInformationExport'])->name('directory-listings.contact-infomation.export');
    Route::get('directory-listings/contactInformation/export', [DirectoryListingController::class,'contactInformationExport'])->name('directory-listings.contact-infomation.export');
    Route::get('directory-listings/location/export', [DirectoryListingLocationController::class,'export'])->name('directory-listings.location.export');
    Route::get('directory-listings/export', [DirectoryListingController::class,'export'])->name('directory-listings.export');
    Route::get('directory-listings/location', [DirectoryListingLocationController::class,'index'])->name('directory-listings.location.index');
    Route::get('directory-listings/location/{id}/edit', [DirectoryListingLocationController::class,'edit'])->name('directory-listings.location.edit');
    Route::get('directory-listings/category', [DirectoryListingCategoryController::class,'index'])->name('directory-listings.category.index');
    Route::get('directory-listings/category/{id}/edit', [DirectoryListingCategoryController::class,'edit'])->name('directory-listings.category.edit');
    Route::get('directory-listings/trash', [DirectoryListingController::class,'trash'])->name('directory-listings.trash');
    Route::resource('directory-listings', DirectoryListingController::class);

    Route::get('restaurants/category', [RestaurantCategoryController::class,'index'])->name('restaurants.category.index');
    Route::get('restaurants/category/{id}/edit', [RestaurantCategoryController::class,'edit'])->name('restaurants.category.edit');
    Route::get('restaurants/export', [RestaurantsController::class,'export'])->name('restaurants.export');
    Route::get('restaurants/trash', [RestaurantsController::class,'trash'])->name('restaurants.trash');
    Route::resource('restaurants', RestaurantsController::class);

    Route::get('planning-applications/export', [PlanningApplicationController::class,'export'])->name('planning-applications.export');
    Route::get('planning-applications/trash', [PlanningApplicationController::class,'trash'])->name('planning-applications.trash');
    Route::resource('planning-applications', PlanningApplicationController::class);

    Route::get('local-eats/export', [LocalEatsController::class,'export'])->name('local-eats.export');
    Route::get('local-eats/trash', [LocalEatsController::class,'trash'])->name('local-eats.trash');
    Route::resource('local-eats', LocalEatsController::class);

    Route::get('transports/export', [TransportController::class,'export'])->name('transports.export');
    Route::get('transports/trash', [TransportController::class,'trash'])->name('transports.trash');
    Route::resource('transports', TransportController::class);
    Route::get('images/export', [ImageController::class,'export'])->name('images.export');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
