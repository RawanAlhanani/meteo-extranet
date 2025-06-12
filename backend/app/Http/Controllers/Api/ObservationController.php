<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function index()
    {
        return Observation::with('user')->get();
    }

    public function show($id)
    {
        return Observation::with('user')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_observation' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $observation = Observation::create($validated);

        return response()->json($observation, 201);
    }

    public function update(Request $request, $id)
    {
        $observation = Observation::findOrFail($id);

        $validated = $request->validate([
            'titre' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'date_observation' => 'sometimes|required|date',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $observation->update($validated);

        return response()->json($observation);
    }

    public function destroy($id)
    {
        $observation = Observation::findOrFail($id);
        $observation->delete();

        return response()->json(null, 204);
    }
}
