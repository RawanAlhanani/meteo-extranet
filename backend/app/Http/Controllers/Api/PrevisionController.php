<?php
// app/Http/Controllers/Api/PrevisionController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prevision;
use Illuminate\Http\Request;

class PrevisionController extends Controller
{
    public function index()
    {
        return Prevision::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string',
            'zone' => 'required|string',
            'description' => 'required|string',
            'date_validite' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        return Prevision::create($data);
    }

    public function show($id)
    {
        return Prevision::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $prevision = Prevision::findOrFail($id);

        $data = $request->validate([
            'titre' => 'string',
            'zone' => 'string',
            'description' => 'string',
            'date_validite' => 'date',
            'user_id' => 'exists:users,id',
        ]);

        $prevision->update($data);
        return $prevision;
    }

    public function destroy($id)
    {
        $prevision = Prevision::findOrFail($id);
        $prevision->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}
