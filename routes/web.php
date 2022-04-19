<?php

use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\ShowPageController;
use App\Http\Controllers\ShowPostCategoryController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SubmitContactFormController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

/**
 * @ todo, move index into a controller or something
 */
Route::get('/', fn() => Inertia::render('Welcome'))->name('index');

Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('dashboard.')->group(function () {
    Route::get('/', fn() => Inertia::render('Dashboard/Index'))->name('index');
    Route::resource('/pages', PageController::class)->except(['show']);

    // Posts
    Route::resource('/posts', PostController::class)->except(['show']);
    Route::delete('/posts/{post}/photo', [PostController::class, 'deletePhoto'])->name('posts.delete-photo');
});

// Blog controller
Route::get('/blog/{post?}', ShowPostController::class)->name('posts.show');
Route::get('/blog/category/{category}', ShowPostCategoryController::class)->name('posts.category');

// Contact
Route::post('/contact', SubmitContactFormController::class)->name('contact');

// Catch all pages
Route::any('/{page}', ShowPageController::class)->name('page');
