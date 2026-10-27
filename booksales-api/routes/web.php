<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/genre', [App\Http\Controllers\GenreController::class, 'index']);

Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index']);

Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
