<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showUserPosts($userId)
    {
        // Récupérer tous les posts de l'utilisateur par son ID
        $posts = Post::where('user_id', $userId)->get();

        // Passer la variable $posts à la vue avec compact
        return view('posts', compact('posts'));
    }
}
