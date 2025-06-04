<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index()
    {
        return response()->json(Bulletin::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'region' => 'required|string',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $bulletin = Bulletin::create($request->all());
        return response()->json($bulletin, 201);
    }

    public function show($id)
    {
        $bulletin = Bulletin::find($id);
        if (!$bulletin) {
            return response()->json(['message' => 'Bulletin non trouvé'], 404);
        }
        return response()->json($bulletin, 200);
    }

    public function update(Request $request, $id)
    {
        $bulletin = Bulletin::find($id);
        if (!$bulletin) {
            return response()->json(['message' => 'Bulletin non trouvé'], 404);
        }

        $request->validate([
            'titre' => 'sometimes|required|string|max:255',
            'region' => 'sometimes|required|string',
            'type' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'date' => 'sometimes|required|date',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $bulletin->update($request->all());
        return response()->json($bulletin, 200);
    }

    public function destroy($id)
    {
        $bulletin = Bulletin::find($id);
        if (!$bulletin) {
            return response()->json(['message' => 'Bulletin non trouvé'], 404);
        }

        $bulletin->delete();
        return response()->json(['message' => 'Bulletin supprimé avec succès'], 200);
    }
}
