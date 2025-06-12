<?php
// app/Http/Controllers/Api/DonneeClimatiqueController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonneeClimatique;
use Illuminate\Http\Request;

class DonneeClimatiqueController extends Controller
{
    public function index()
    {
        return DonneeClimatique::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'date_publication' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        return DonneeClimatique::create($data);
    }

    public function show($id)
    {
        return DonneeClimatique::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $donnee = DonneeClimatique::findOrFail($id);

        $data = $request->validate([
            'titre' => 'string',
            'type' => 'string',
            'description' => 'string',
            'date_publication' => 'date',
            'user_id' => 'exists:users,id',
        ]);

        $donnee->update($data);
        return $donnee;
    }

    public function destroy($id)
    {
        $donnee = DonneeClimatique::findOrFail($id);
        $donnee->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}
