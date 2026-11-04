<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('genre', GenreController::class)->only(['index', 'show']);
Route::apiResource('author', AuthorController::class)->only(['index', 'show']);
Route::apiResource('book', BookController::class)->only(['index', 'show']);

Route::middleware(['auth:api'])->group(function () {
  Route::apiResource('transaction', TransactionController::class)->only(['store', 'show', 'update']); // Beli buku
  Route::get('/my-transaction', [TransactionController::class, 'myTransactions']); // Lihat transaksi akun yang sedang login
});

Route::middleware(['Admin'])->group(function () {
  Route::apiResource('genre', GenreController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('author', AuthorController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('book', BookController::class)->only(['store', 'update', 'destroy']);
  Route::apiResource('transaction', TransactionController::class)->only(['index', 'destroy']);
});
