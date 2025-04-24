<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
Route::resource('/categories',   CategoryController::class);
Route::resource('/books',   BookController::class);
Route::get('/books/trash', [BookController::class, 'trash'])->name('books.trash');
Route::get('/categories/trash',[CategoryController::class, 'trash'])->name('categories.trash');
Route::put('/books/restore/{id}', [BookController::class, 'restore'])->name('books.restore');
Route::put('/categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
Route::delete('/books/force-delete/{id}', [BookController::class, 'forceDelete'])->name('books.forceDelete');
Route::delete('/categories/force-delete/{id}', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
