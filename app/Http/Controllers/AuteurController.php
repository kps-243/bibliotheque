<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Auteur::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $auteur = Auteur::create($validated);
        return response()->json($auteur, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $auteur = Auteur::find($id);
        if (!$auteur) return response()->json(['message' => 'Auteur non trouvé'], 404);

        return response()->json($auteur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $auteur = Auteur::find($id);
        if (!$auteur) return response()->json(['message' => 'Auteur non trouvé'], 404);

        $auteur->update($validated);
        return response()->json($auteur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $auteur = Auteur::find($id);
        if (!$auteur) return response()->json(['message' => 'Auteur non trouvé'], 404);

        try {
            $auteur->delete();
            return response()->json(['message' => 'Auteur supprimé']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur suppression'], 400);
        }
    }
}
