<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        return response()->json(Article::all());
    }

    // Membuat artikel baru (khusus admin)
    public function store(Request $request)
    {
        // Cek apakah user login adalah admin
        if (Auth::user()->role->name !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return response()->json($article, 201);
    }
}
