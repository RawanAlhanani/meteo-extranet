<?php
// app/Http/Controllers/Api/CarteController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carte;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    public function index()
    {
        return Carte::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'url' => 'required|url',
            'date_mise_jour' => 'required|date',
            'date_validité' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        return Carte::create($data);
    }

    public function show($id)
    {
        return Carte::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $carte = Carte::findOrFail($id);

        $data = $request->validate([
            'type' => 'string',
            'url' => 'url',
            'date_mise_jour' => 'date',
            'date_validité' => 'date',
            'user_id' => 'exists:users,id',
        ]);

        $carte->update($data);
        return $carte;
    }

    public function destroy($id)
    {
        $carte = Carte::findOrFail($id);
        $carte->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}
