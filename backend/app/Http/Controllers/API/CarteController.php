<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Carte;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    public function index()
    {
        return response()->json(Carte::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'url' => 'required|url',
            'date_mise_jour' => 'required|date',
            'date_validité' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $carte = Carte::create($validated);
        return response()->json($carte, 201);
    }

    public function show($id)
    {
        $carte = Carte::find($id);
        if (!$carte) {
            return response()->json(['message' => 'Carte non trouvée'], 404);
        }
        return response()->json($carte);
    }

    public function update(Request $request, $id)
    {
        $carte = Carte::find($id);
        if (!$carte) {
            return response()->json(['message' => 'Carte non trouvée'], 404);
        }

        $validated = $request->validate([
            'type' => 'sometimes|string',
            'url' => 'sometimes|url',
            'date_mise_jour' => 'sometimes|date',
            'date_validité' => 'sometimes|date',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $carte->update($validated);
        return response()->json($carte);
    }

    public function destroy($id)
    {
        $carte = Carte::find($id);
        if (!$carte) {
            return response()->json(['message' => 'Carte non trouvée'], 404);
        }

        $carte->delete();
        return response()->json(['message' => 'Carte supprimée avec succès']);
    }
}
