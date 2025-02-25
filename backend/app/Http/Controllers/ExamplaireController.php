<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examplaire;

class ExamplaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Examplaire::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_book' => 'required',
            'quantity' => 'required',
        ]);

        $examplaire = Examplaire::create($validate);

        return response()->json([
            'message' => 'Examplaire created successfully',
            'examplaire' => $examplaire
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $examplaire = Examplaire::find($id);



        return response()->json($examplaire);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $examplaire = Examplaire::find($id);
        $examplaire->update($request->all());

        return response()->json($examplaire);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $examplaire = Examplaire::find($id);
        $examplaire->delete();

        return response()->json([
            'message' => 'Examplaire deleted successfully'
        ]);
    }
}
