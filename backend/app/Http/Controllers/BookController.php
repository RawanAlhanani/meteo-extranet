<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use finfo;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'id_author' => 'required',
            'id_category' => 'required',
        ]);

        $book = Book::create($validate);

        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}
