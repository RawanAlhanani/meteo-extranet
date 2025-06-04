<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prevision;
use Illuminate\Http\Request;

class PrevisionController extends Controller
{
    // Afficher toutes les prévisions
    public function index()
    {
        $previsions = Prevision::all();
        return response()->json($previsions);
    }

    // Afficher une prévision spécifique
    public function show($id)
    {
        $prevision = Prevision::find($id);

        if (!$prevision) {
            return response()->json(['message' => 'Prévision non trouvée'], 404);
        }

        return response()->json($prevision);
    }

    // Créer une nouvelle prévision
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'temperature' => 'required|numeric',
            'humidité' => 'required|numeric',
            'precipitation' => 'required|numeric',
        ]);

        $prevision = Prevision::create($validated);
        return response()->json($prevision, 201);
    }

    // Mettre à jour une prévision existante
    public function update(Request $request, $id)
    {
        $prevision = Prevision::find($id);

        if (!$prevision) {
            return response()->json(['message' => 'Prévision non trouvée'], 404);
        }

        $validated = $request->validate([
            'date' => 'required|date',
            'temperature' => 'required|numeric',
            'humidité' => 'required|numeric',
            'precipitation' => 'required|numeric',
        ]);

        $prevision->update($validated);
        return response()->json($prevision);
    }

    // Supprimer une prévision
    public function destroy($id)
    {
        $prevision = Prevision::find($id);

        if (!$prevision) {
            return response()->json(['message' => 'Prévision non trouvée'], 404);
        }

        $prevision->delete();
        return response()->json(['message' => 'Prévision supprimée']);
    }
}
