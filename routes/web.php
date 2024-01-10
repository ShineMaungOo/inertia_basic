<?php

use App\Http\Controllers\CategoryController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('posts/create');
Route::post('/posts/store', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('posts/store');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('posts/show');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('posts/destroy');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts/edit');
Route::put('/posts/update', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts/update');

Route::get('/categories', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('categories/create');
Route::post('/categories/store', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('categories/store');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('categories/destroy');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('categories/edit');
Route::put('/categories/update', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('categories/update');
