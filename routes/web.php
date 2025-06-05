<?php

use Illuminate\Support\Facades\Route;
use App\Models\Auteur;
use App\Models\Livre;
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

Route::delete('/api/auteurs/{id}', function ($id) {
    $auteur = Auteur::find($id);
    if (!$auteur) {
        return response()->json(['message' => 'Auteur non trouvé'], 404);
    }

    try {
        $auteur->delete();
        return response()->json(['message' => 'Auteur supprimé']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Impossible de supprimer cet auteur.'], 400);
    }
});

Route::get('/api/livres', function () {
    return response()->json(
        Livre::with('auteur')->get()
    );
});


Route::post('/api/livres', function (Request $request) {
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'date_publication' => 'required|date',
        'auteur_id' => 'required|exists:auteurs,id',
    ]);

    $livre = Livre::create($validated);

    return response()->json($livre, 201);
});

Route::get('/api/livres/{id}', function ($id) {
    $livre = Livre::with('auteur')->find($id);
    if (!$livre) {
        return response()->json(['message' => 'Livre non trouvé'], 404);
    }
    return response()->json($livre);
});

// ✅ Modifier un livre
Route::put('/api/livres/{id}', function (Request $request, $id) {
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'date_publication' => 'required|date',
        'auteur_id' => 'required|exists:auteurs,id',
    ]);

    $livre = Livre::find($id);
    if (!$livre) {
        return response()->json(['message' => 'Livre non trouvé'], 404);
    }

    $livre->update($validated);

    return response()->json($livre);
});

Route::delete('/api/livres/{id}', function ($id) {
    $livre = Livre::find($id);
    if (!$livre) {
        return response()->json(['message' => 'Livre non trouvé'], 404);
    }

    $livre->delete();

    return response()->json(['message' => 'Livre supprimé']);
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
