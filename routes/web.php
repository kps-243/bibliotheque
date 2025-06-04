<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\LivreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/auteurs', [AuteurController::class, 'index']);
Route::get('/api/livres', [LivreController::class, 'index']);