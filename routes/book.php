<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::post('/books', [BookController::class, 'store'])->name('book.store');
Route::patch('books/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('book.destroy');

