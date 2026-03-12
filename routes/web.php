<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(App\Http\Controllers\PostController::class)->group(function () {
Route::get('/posts','index')->name('posts.index');
Route::get('/posts/create','create')->name('posts.create');
Route::post('/posts','store')->name('posts.store');
Route::get('posts/{id}','show')->name('posts.show');
Route::get('/posts/{id}/edit','edit')->name('posts.edit');
Route::put('/posts/{id}','update')->name('posts.update');
Route::delete('/posts/{id}','destroy')->name('posts.destroy');
});