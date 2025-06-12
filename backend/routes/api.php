<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BulletinController;
use App\Http\Controllers\Api\CarteController;
use App\Http\Controllers\Api\DonneeClimatiqueController;
use App\Http\Controllers\Api\HistoriqueUtilisateurController;
use App\Http\Controllers\Api\ObservationController;
use App\Http\Middleware\CorsMiddleware;
use App\Http\Controllers\Api\PrevisionController;
use App\Http\Controllers\Api\UserController;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'mot_de_passe' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->mot_de_passe, $user->mot_de_passe)) {
        throw ValidationException::withMessages([
            'email' => ['Les informations sont incorrectes.'],
        ]);
    }

    return ['token' => $user->createToken('token-name')->plainTextToken];
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Déconnecté']);
});


Route::get('/test', function () {
    return response()->json(['message' => 'Bienvenue depuis Laravel !']);
});
Route::prefix('v1')->group(function () {
    Route::prefix('bulletins')->controller(BulletinController::class)->group(function () {
        Route::get('/', 'index');        
        Route::post('/', 'store');        
        Route::get('{id}', 'show');       
        Route::put('{id}', 'update');     
        Route::delete('{id}', 'destroy'); 
    });
    Route::prefix('cartes')->controller(CarteController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });
    Route::prefix('donnees-climatiques')->controller(DonneeClimatiqueController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });
    Route::prefix('historiques-utilisateurs')->controller(HistoriqueUtilisateurController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });
    Route::prefix('observations')->controller(ObservationController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });
    Route::prefix('previsions')->controller(PrevisionController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });
    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'destroy');
    });

});


