<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

// Genre API
Route::get('/genres', [GenreController::class, 'index']);
Route::post('/genres', [GenreController::class, 'store']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
Route::put('/genres/{id}', [GenreController::class, 'update']);

// Author API
Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);
Route::put('/authors/{id}', [AuthorController::class, 'update']);

Route::get('/books', [AuthorController::class, 'index']);
Route::post('/books', [AuthorController::class, 'store']);
