<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route untuk Genre
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

// Route untuk Author
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

Route::get('/books', [BookController::class, 'index'])->name('books.index');