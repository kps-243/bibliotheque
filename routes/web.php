<?php

use Illuminate\Support\Facades\Route;
use App\Models\Auteur;
use Illuminate\Http\Request;

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\LivreController;

Route::get('/api/auteurs', function () {
    return response()->json(Auteur::all());
});

Route::post('/api/auteurs', function (Request $request) {
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
    ]);

    $auteur = Auteur::create($validated);

    return response()->json($auteur, 201);
});

Route::get('/api/auteurs/{id}', function ($id) {
    $auteur = Auteur::find($id);
    if (!$auteur) {
        return response()->json(['message' => 'Auteur non trouvé'], 404);
    }
    return response()->json($auteur);
});

Route::put('/api/auteurs/{id}', function (Request $request, $id) {
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
    ]);

    $auteur = Auteur::find($id);
    if (!$auteur) {
        return response()->json(['message' => 'Auteur non trouvé'], 404);
    }

    $auteur->update($validated);

    return response()->json($auteur);
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
