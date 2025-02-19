<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibrarianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

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
