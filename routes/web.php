<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AppController::class, 'index'])->name('home')->middleware('auth');

// * Book
Route::middleware('auth')->group(function () {
    Route::get('book/create/', [BookController::class, 'create'])->name('book.create');
    Route::post('book/store/', [BookController::class, 'store'])->name('book.store');
    Route::post('book/detail/{id}', [BookController::class, 'detail'])->name('book.detail');
    Route::get("book/read/{id}", [BookController::class, 'read'])->name('book.read');
    Route::get('book/update/{id}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('book/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('content/{id}', [BookController::class, 'content'])->name('book.content');
});

// * Publisher
Route::get('publisher/', [PublisherController::class, 'index'])->name('publisher');
Route::get('publisher/detail/{id}', [PublisherController::class, 'detail'])->name('publisher.detail');
Route::get('publisher/create/', [PublisherController::class, 'create'])->name('publisher.create');
Route::post('publisher/store/', [PublisherController::class, 'store'])->name('publisher.store');

// * Auth
Route::middleware('guest')->group(function() {
    Route::get('register/', [UserController::class, 'register'])->name('register');
    Route::post('register/', [UserController::class, 'store'])->name('user.store');
    Route::get('login/', [UserController::class, 'login'])->name('login');
    Route::post('login/', [UserController::class, 'search'])->name('user.search');
});

// * Admin
Route::get('admin/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::middleware('auth')->group(function() {
    Route::post('logout/', [UserController::class, 'logout'])->name('logout');
    Route::get('profile/{id}', [UserController::class, 'profile'])->name('profile');
 } );

 // ! Note : Kalau buka route 'home', tidak bisa akses 'view book detail'
 // * Harus login dulu, baru bisa akses 'view book detail'