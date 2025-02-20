<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Afficher les posts d'un utilisateur
    public function showUserPosts($userId)
    {
        // Récupérer tous les posts de l'utilisateur par son ID
        $posts = Post::where('user_id', $userId)->get();

        // Passer les posts à la vue
        return view('posts', compact('posts'));
    }
}

