<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all());
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'id_author' => 'required',
            'id_category' => 'required',
        ]);


        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        if (!$book){
            return response()->json(['message' => 'Book not found'], 404);
        }


        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'id_author' => 'required',
            'id_category' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!$book) {
            return redirect()->back()->withErrors(['error' => 'Book not found'])->withInput();
        }
        $book->update($request->all());

        return response()->json($book);
    }


    public function destroy(Book $book)
    {

        if (!$book) {
            return redirect()->back()->withErrors(['error' => 'Book not found'])->withInput();
        }
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}
