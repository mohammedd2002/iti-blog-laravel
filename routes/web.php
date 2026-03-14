<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
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

Route::middleware('auth')->group(function () {

    Route::controller(App\Http\Controllers\PostController::class)->group(function () {
        Route::get('/posts', 'index')->name('posts.index');
        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts', 'store')->name('posts.store');
        Route::get('/posts/trashed', 'trashed')->name('posts.trashed');
        Route::get('posts/{post}', 'show')->name('posts.show');
        Route::get('/posts/{id}/edit', 'edit')->name('posts.edit');
        Route::put('/posts/{id}', 'update')->name('posts.update');
        Route::delete('/posts/{id}', 'destroy')->name('posts.destroy');
        Route::post('/posts/{id}/restore', 'restore')->name('posts.restore');
    });

    Route::controller(App\Http\Controllers\CommentController::class)->group(function () {
        Route::post('/posts/{id}/comments', 'store')->name('comments.store');
        Route::get('/comments/{comment}/edit', 'edit')->name('comments.edit');
        Route::put('/comments/{comment}', 'update')->name('comments.update');
        Route::delete('/comments/{id}', 'destroy')->name('comments.destroy');
    });
});
