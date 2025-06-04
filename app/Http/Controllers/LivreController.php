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
        return Livre::with('auteur')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'prix' => 'required|numeric',
            'date_publication' => 'required|date',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        return Livre::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Livre::with('auteur')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $livre = Livre::findOrFail($id);
        $livre->update($request->all());

        return $livre;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return response()->json(['message' => 'Livre supprimé']);
    }
}
