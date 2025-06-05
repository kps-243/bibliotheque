<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Http\Requests\StoreLivreRequest;
use App\Http\Requests\UpdateLivreRequest;

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
    public function store(StoreLivreRequest $request)
    {
        $livre = Livre::create($request->validated());
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
    public function update(UpdateLivreRequest $request, $id)
    {
        $livre = Livre::findOrFail($id);
        $livre->update($request->validated());
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
