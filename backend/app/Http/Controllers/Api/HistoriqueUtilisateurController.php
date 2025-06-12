<?php
// app/Http/Controllers/Api/HistoriqueUtilisateurController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoriqueUtilisateur;
use Illuminate\Http\Request;

class HistoriqueUtilisateurController extends Controller
{
    public function index()
    {
        return HistoriqueUtilisateur::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'action' => 'required|string',
            'date_action' => 'required|date',
        ]);

        return HistoriqueUtilisateur::create($data);
    }

    public function show($id)
    {
        return HistoriqueUtilisateur::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $historique = HistoriqueUtilisateur::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'exists:users,id',
            'action' => 'string',
            'date_action' => 'date',
        ]);

        $historique->update($data);
        return $historique;
    }

    public function destroy($id)
    {
        $historique = HistoriqueUtilisateur::findOrFail($id);
        $historique->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}
