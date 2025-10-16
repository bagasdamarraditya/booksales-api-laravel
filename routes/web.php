<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome'); // ini halaman utama Laravel
});

// Route untuk Genre
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

// Route untuk Author
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

Route::get('/books', [BookController::class, 'index'])->name('books.index');

