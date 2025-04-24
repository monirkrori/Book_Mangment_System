<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [BookController::class,'viewCount'])->name('home');

Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
