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
        return Auteur::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
        ]);

        return Auteur::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Auteur::with('livres')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $auteur = Auteur::findOrFail($id);
        $auteur->update($request->all());

        return $auteur;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auteur = Auteur::findOrFail($id);
        $auteur->delete();

        return response()->json(['message' => 'Auteur supprimé']);
    }
}
