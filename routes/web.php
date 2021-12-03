<?php

use App\Http\Controllers\PageController;
use Illuminate\Foundation\Application;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Static pages
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('programming', [PageController::class, 'programming'])->name('programming');
Route::get('audiophile', [PageController::class, 'audiophile'])->name('audiophile');
Route::get('tech', [PageController::class, 'tech'])->name('tech');
Route::get('mental-health', [PageController::class, 'mental-health'])->name('mental');
Route::get('support', [PageController::class, 'support'])->name('support');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
