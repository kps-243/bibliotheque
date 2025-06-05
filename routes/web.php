<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\LivreController;

Route::prefix('api')->group(function () {
    // Routes Auteurs
    Route::get('/auteurs', [AuteurController::class, 'index']);
    Route::post('/auteurs', [AuteurController::class, 'store']);
    Route::get('/auteurs/{id}', [AuteurController::class, 'show']);
    Route::put('/auteurs/{id}', [AuteurController::class, 'update']);
    Route::delete('/auteurs/{id}', [AuteurController::class, 'destroy']);

    // Routes Livres
    Route::get('/livres', [LivreController::class, 'index']);
    Route::post('/livres', [LivreController::class, 'store']);
    Route::get('/livres/{id}', [LivreController::class, 'show']);
    Route::put('/livres/{id}', [LivreController::class, 'update']);
    Route::delete('/livres/{id}', [LivreController::class, 'destroy']);
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
