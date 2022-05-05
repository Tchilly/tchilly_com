<?php

use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\PostController as PublicPostController;
use App\Http\Controllers\ShowPageController;
use App\Http\Controllers\SubmitContactFormController;
use App\Http\Controllers\SearchPageController;
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

/**
 * Dashboard routes
 */
Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('dashboard.')->group(function () {
    Route::get('/', fn() => Inertia::render('Dashboard/Index'))->name('index');
    Route::resource('/pages', PageController::class)->except(['show']);

    // Posts
    Route::resource('/posts', PostController::class)->except(['show']);
    Route::delete('/posts/{post}/photo', [PostController::class, 'deletePhoto'])->name('posts.delete-photo');
});

/**
 * Public routes
 */

// Blog
Route::scopeBindings()->group(function () {
    Route::get('/blog/{category?}', [PublicPostController::class, 'index'])->name('posts.index');
    Route::get('/blog/{category?}/{post?}', [PublicPostController::class, 'show'])->name('posts.show');
});

// Contact
Route::post('/contact', SubmitContactFormController::class)->name('contact');

// Search
Route::get('/search{query?}', SearchPageController::class)->name('search');

// Catch all pages
Route::any('/{page}', ShowPageController::class)->name('page');
