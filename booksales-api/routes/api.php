<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/genre', [App\Http\Controllers\GenreController::class, 'index']);
Route::post('/genre', [App\Http\Controllers\GenreController::class, 'store']);

Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index']);
Route::post('/author', [App\Http\Controllers\AuthorController::class, 'store']);

Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
