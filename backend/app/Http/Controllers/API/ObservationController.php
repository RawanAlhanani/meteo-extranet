<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function index()
    {
        return response()->json(Observation::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_observation' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $observation = Observation::create($request->all());
        return response()->json($observation, 201);
    }

    public function show($id)
    {
        $observation = Observation::find($id);
        if (!$observation) {
            return response()->json(['message' => 'Observation non trouvée'], 404);
        }
        return response()->json($observation, 200);
    }

    public function update(Request $request, $id)
    {
        $observation = Observation::find($id);
        if (!$observation) {
            return response()->json(['message' => 'Observation non trouvée'], 404);
        }

        $request->validate([
            'titre' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'date_observation' => 'sometimes|required|date',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $observation->update($request->all());
        return response()->json($observation, 200);
    }

    public function destroy($id)
    {
        $observation = Observation::find($id);
        if (!$observation) {
            return response()->json(['message' => 'Observation non trouvée'], 404);
        }

        $observation->delete();
        return response()->json(['message' => 'Observation supprimée avec succès'], 200);
    }
}
