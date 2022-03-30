<?php

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\ShowPageController;
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

Route::get('/', fn() => Inertia::render('Welcome'))->name('index');


Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('dashboard.')->group(function () {
    Route::get('/', fn() => Inertia::render('Dashboard/Index'))->name('index');
    Route::resource('/pages', PageController::class)->except(['show']);
    Route::resource('/blogs', BlogController::class)->except(['show']);
});

Route::any('/{page}', ShowPageController::class)->name('page');
