<?php

use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\ShowPageController;
use App\Http\Controllers\ShowPostController;
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
    Route::resource('/posts', PostController::class)->except(['show']);
});

// Blog controller
Route::get('/blog/{post?}', ShowPostController::class)->name('posts');

// Catch all pages
Route::any('/{page}', ShowPageController::class)->name('page');
