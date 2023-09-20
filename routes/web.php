<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Models\Publisher;
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
Route::post('book/detail/{id}', [BookController::class, 'detail'])->name('book.detail');
Route::get('book/update/{id}', [BookController::class, 'update'])->name('book.update');
Route::post('book/update/{id}', [BookController::class, 'updateBook'])->name('book.updated');
Route::delete('book/delete/{id}', [BookController::class, 'deleteBook'])->name('book.destroy');
Route::get('publisher/', [PublisherController::class, 'index'])->name('publisher');
Route::get('publisher/detail/{id}', [PublisherController::class, 'detail'])->name('publisher.detail');
Route::get('publisher/create/', [PublisherController::class, 'create'])->name('publisher.create');
Route::post('publisher/store/', [PublisherController::class, 'store'])->name('publisher.store');