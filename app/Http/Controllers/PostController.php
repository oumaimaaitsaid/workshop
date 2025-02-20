<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Afficher tous les posts
    public function index()
    {
        $posts = Post::all(); // Récupérer tous les posts
        return view('posts.index', compact('posts'));
    }

    // Afficher tous les posts d'un utilisateur spécifique
    public function showUserPosts($userId)
    {
        $posts = Post::where('user_id', $userId)->get();
        return view('posts.index', compact('posts'));
    }

    // Afficher le formulaire pour créer un nouveau post
    public function create()
    {
        return view('posts.create');
    }

    // Sauvegarder un nouveau post dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Créer le post avec un user_id par défaut
        Post::create([
            'user_id' => 1, // Remplace 1 par une valeur par défaut
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('posts.index')->with('success', 'Post créé avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    // Mettre à jour un post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post mis à jour avec succès');
    }

    // Supprimer un post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post supprimé avec succès');
    }
}
