<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Livre::with('auteur')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'date_publication' => 'required|date',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        $livre = Livre::create($validated);
        return response()->json($livre, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $livre = Livre::with('auteur')->find($id);
        if (!$livre) return response()->json(['message' => 'Livre non trouvé'], 404);

        return response()->json($livre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'date_publication' => 'required|date',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        $livre = Livre::find($id);
        if (!$livre) return response()->json(['message' => 'Livre non trouvé'], 404);

        $livre->update($validated);
        return response()->json($livre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $livre = Livre::find($id);
        if (!$livre) return response()->json(['message' => 'Livre non trouvé'], 404);

        $livre->delete();
        return response()->json(['message' => 'Livre supprimé']);
    }
}
