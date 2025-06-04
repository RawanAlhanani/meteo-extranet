<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'date_publication' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $article = Article::create($validated);
        return response()->json($article, 201);
    }

    public function show($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article non trouvé'], 404);
        }
        return response()->json($article);
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article non trouvé'], 404);
        }

        $validated = $request->validate([
            'titre' => 'sometimes|string',
            'type' => 'sometimes|string',
            'description' => 'sometimes|string',
            'date_publication' => 'sometimes|date',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $article->update($validated);
        return response()->json($article);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article non trouvé'], 404);
        }

        $article->delete();
        return response()->json(['message' => 'Article supprimé avec succès']);
    }
}
