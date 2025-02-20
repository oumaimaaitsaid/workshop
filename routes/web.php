<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('posts');
// });
use App\Http\Controllers\PostController;

Route::get('/user/{userId}/posts', [PostController::class, 'showUserPosts'])->name('posts');
