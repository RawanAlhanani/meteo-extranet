<?php
// app/Http/Controllers/Api/BulletinController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index()
    {
        return Bulletin::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string',
            'region' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        return Bulletin::create($data);
    }

    public function show($id)
    {
        return Bulletin::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $bulletin = Bulletin::findOrFail($id);

        $data = $request->validate([
            'titre' => 'string',
            'region' => 'string',
            'type' => 'string',
            'description' => 'string',
            'date' => 'date',
            'user_id' => 'exists:users,id',
        ]);

        $bulletin->update($data);
        return $bulletin;
    }

    public function destroy($id)
    {
        $bulletin = Bulletin::findOrFail($id);
        $bulletin->delete();
        return response()->json(['message' => 'Supprimé']);
    }
}
