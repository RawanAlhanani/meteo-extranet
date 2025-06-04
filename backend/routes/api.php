<?php

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ObservationController;
use App\Http\Controllers\API\BulletinController;
use App\Http\Controllers\API\PrevisionController;
use App\Http\Controllers\API\CarteController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\HistoriqueUtilisateurController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return 'API OK';
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);       // GET /api/users
    Route::post('/', [UserController::class, 'store']);      // POST /api/users
    Route::get('{id}', [UserController::class, 'show']);     // GET /api/users/{id}
    Route::put('{id}', [UserController::class, 'update']);   // PUT /api/users/{id}
    Route::delete('{id}', [UserController::class, 'destroy']); // DELETE /api/users/{id}
});

Route::prefix('observations')->group(function () {
    Route::get('/', [ObservationController::class, 'index']);         
    Route::post('/', [ObservationController::class, 'store']);        
    Route::get('{id}', [ObservationController::class, 'show']);       
    Route::put('{id}', [ObservationController::class, 'update']);     
    Route::delete('{id}', [ObservationController::class, 'destroy']); 
});

Route::prefix('bulletins')->group(function () {
    Route::get('/', [BulletinController::class, 'index']);         // GET /api/bulletins
    Route::post('/', [BulletinController::class, 'store']);        // POST /api/bulletins
    Route::get('{id}', [BulletinController::class, 'show']);       // GET /api/bulletins/{id}
    Route::put('{id}', [BulletinController::class, 'update']);     // PUT /api/bulletins/{id}
    Route::delete('{id}', [BulletinController::class, 'destroy']); // DELETE /api/bulletins/{id}
});


Route::prefix('previsions')->group(function () {
    Route::get('/', [PrevisionController::class, 'index']);         // GET /api/previsions
    Route::post('/', [PrevisionController::class, 'store']);        // POST /api/previsions
    Route::get('{id}', [PrevisionController::class, 'show']);       // GET /api/previsions/{id}
    Route::put('{id}', [PrevisionController::class, 'update']);     // PUT /api/previsions/{id}
    Route::delete('{id}', [PrevisionController::class, 'destroy']); // DELETE /api/previsions/{id}
});

Route::prefix('cartes')->group(function () {
    Route::get('/', [CarteController::class, 'index']);         // GET /api/cartes
    Route::post('/', [CarteController::class, 'store']);        // POST /api/cartes
    Route::get('{id}', [CarteController::class, 'show']);       // GET /api/cartes/{id}
    Route::put('{id}', [CarteController::class, 'update']);     // PUT /api/cartes/{id}
    Route::delete('{id}', [CarteController::class, 'destroy']); // DELETE /api/cartes/{id}
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);         // GET /api/articles
    Route::post('/', [ArticleController::class, 'store']);        // POST /api/articles
    Route::get('{id}', [ArticleController::class, 'show']);       // GET /api/articles/{id}
    Route::put('{id}', [ArticleController::class, 'update']);     // PUT /api/articles/{id}
    Route::delete('{id}', [ArticleController::class, 'destroy']); // DELETE /api/articles/{id}
});

Route::prefix('historiques-utilisateurs')->group(function () {
    Route::get('/', [HistoriqueUtilisateurController::class, 'index']);         // GET /api/historiques-utilisateurs
    Route::post('/', [HistoriqueUtilisateurController::class, 'store']);        // POST /api/historiques-utilisateurs
    Route::get('{id}', [HistoriqueUtilisateurController::class, 'show']);       // GET /api/historiques-utilisateurs/{id}
    Route::put('{id}', [HistoriqueUtilisateurController::class, 'update']);     // PUT /api/historiques-utilisateurs/{id}
    Route::delete('{id}', [HistoriqueUtilisateurController::class, 'destroy']); // DELETE /api/historiques-utilisateurs/{id}
});
=======
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












>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
