<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
// use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('genre', GenreController::class)->only(['index', 'show']);
Route::apiResource('author', AuthorController::class)->only(['index', 'show']);

Route::middleware('Admin')->group(function () {
    Route::apiResource('genre', GenreController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('author', AuthorController::class)->only(['store', 'update', 'destroy']);
});

