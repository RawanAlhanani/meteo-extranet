<?php

namespace App\Http\Controllers;

use App\Models\Author;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Author::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'piography' => 'required|string',
        ]);

        $author = Author::create($validate);

        return response()->json([
            'message' => 'Author created successfully',
            'author' => $author
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::find($id);
        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = Author::find($id);
        $author->update($request->all());

        return response()->json($author);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        $author->delete();

        return response()->json([
            'message' => 'Author deleted successfully'
        ], 204);
    }
}
