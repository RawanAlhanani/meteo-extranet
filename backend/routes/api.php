<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowRecordController;
use App\Http\Controllers\ReservationController;

use Illuminate\Support\Facades\Route;




// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/test', [AuthController::class, 'index']);


// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Admin-only routes
    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    });

    // Librarian-only routes
    Route::middleware('librarian')->group(function () {
        Route::get('/librarian/dashboard', [LibrarianController::class, 'dashboard']);
    });
});


// Common routes
Route::prefix('/authors', 'authors')->controller(AuthorController::class)->name('author') ->group(function () {
    Route::get('/', 'index');
    Route::get('/{author}', 'show')->whereNumber('id');
    Route::post('/create', 'store');
    Route::put('/{author}', 'update')->whereNumber('id');
    Route::delete('/{author}', 'destroy')->whereNumber('id');
});

Route::prefix('/categories', 'categories')->controller(CategoryController::class)->name('category') ->group(function () {
    Route::get('/', 'index');
    Route::get('/{category}', 'show') ->whereNumber('id');
    Route::post('/create', 'store');
    Route::put('/{category}', 'update')->whereNumber('id');
    Route::delete('/{category}', 'destroy')->whereNumber('id');
});
Route::prefix('/books', 'books')->controller(BookController::class)->name('book') ->group(function () {
    Route::get('/', 'index');
    Route::get('/{book}', 'show') ->whereNumber('id');
    Route::post('/create', 'store');
    Route::put('/{book}', 'update') ->whereNumber('id');
    Route::delete('/{book}', 'destroy')->whereNumber('id');
});

Route::prefix('/reservations')->controller(ReservationController::class)->name('reservation')->group(function () {
    Route::get('/', 'index');
    Route::get('/{reservation}', 'show') ->whereNumber('id');
    Route::post('/create', 'store');
    Route::put('/{reservation}', 'update') ->whereNumber('id');
    Route::delete('/{reservation}', 'destroy')->whereNumber('id')  ;
});

Route::prefix('/borrow', 'borrow')->controller(BorrowRecordController::class)->name('examplaire') ->group(function () {
    Route::get('/', 'index');
    Route::get('/{borrow}', 'show')->whereNumber('id');
    Route::post('/create', 'store');
    Route::put('/{borrow}', 'update')->whereNumber('id');
    Route::delete('/{borrow}', 'destroy')->whereNumber('id');
});












