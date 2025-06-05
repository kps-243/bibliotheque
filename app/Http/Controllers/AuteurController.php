<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAuteurRequest;
use App\Http\Requests\UpdateAuteurRequest;

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
    public function store(StoreAuteurRequest $request)
    {
        $auteur = Auteur::create($request->validated());
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
    public function update(UpdateAuteurRequest $request, $id)
    {
        $auteur = Auteur::findOrFail($id);
        $auteur->update($request->validated());
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
