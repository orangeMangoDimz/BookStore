<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('book/create/', [BookController::class, 'create'])->name('createBook');
Route::post('book/store/', [BookController::class, 'storeBook'])->name('book.store');
Route::post('book/detail/{id}', [BookController::class, 'showBookDetail'])->name('book.detail');
Route::get('book/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::post('book/update/{id}', [BookController::class, 'updateBook'])->name('book.updated');
Route::delete('book/delete/{id}', [BookController::class, 'deleteBook'])->name('book.destroy');