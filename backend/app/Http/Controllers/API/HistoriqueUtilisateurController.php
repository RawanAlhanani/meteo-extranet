<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoriqueUtilisateur;
use Illuminate\Http\Request;

class HistoriqueUtilisateurController extends Controller
{
    public function index()
    {
        return response()->json(HistoriqueUtilisateur::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'action' => 'required|string',
        ]);

        $historique = HistoriqueUtilisateur::create([
            'user_id' => $validated['user_id'],
            'action' => $validated['action'],
            'date_action' => now(),  // Enregistre l'heure actuelle
        ]);

        return response()->json($historique, 201);
    }

    public function show($id)
    {
        $historique = HistoriqueUtilisateur::find($id);
        if (!$historique) {
            return response()->json(['message' => 'Historique non trouvé'], 404);
        }
        return response()->json($historique);
    }

    public function update(Request $request, $id)
    {
        $historique = HistoriqueUtilisateur::find($id);
        if (!$historique) {
            return response()->json(['message' => 'Historique non trouvé'], 404);
        }

        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'action' => 'sometimes|string',
        ]);

        $historique->update($validated);
        return response()->json($historique);
    }

    public function destroy($id)
    {
        $historique = HistoriqueUtilisateur::find($id);
        if (!$historique) {
            return response()->json(['message' => 'Historique non trouvé'], 404);
        }

        $historique->delete();
        return response()->json(['message' => 'Historique supprimé avec succès']);
    }
}
