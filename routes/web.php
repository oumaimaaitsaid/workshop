<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('posts');
// });
use App\Http\Controllers\PostController;

// Route pour afficher les posts d'un utilisateur spécifique
Route::get('/user/{userId}/posts', [PostController::class, 'showUserPosts'])->name('posts.user');

// Routes CRUD pour les posts (index, create, store, show, edit, update, destroy)
Route::resource('posts', PostController::class);