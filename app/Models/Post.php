<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // Définir les colonnes qui peuvent être massivement assignées
    protected $fillable = ['user_id', 'title', 'content'];

    // Définir la relation "Appartient à" avec le modèle User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Méthode pour créer un post
    public static function createPost(array $data)
    {
        return self::create($data);
    }

    // Méthode pour mettre à jour un post
    public static function updatePost($id, array $data)
    {
        $post = self::find($id);
        if ($post) {
            $post->update($data);
            return $post;
        }

        return null;
    }

    // Méthode pour supprimer un post
    public static function deletePost($id)
    {
        $post = self::find($id);
        if ($post) {
            $post->delete();
            return true;
        }

        return false;
    }

    // Méthode pour rechercher des posts avec conditions
    public static function getPostsByUser($userId)
    {
        return self::where('user_id', $userId)->get();
    }

    // Méthode pour trouver un post par titre
    public static function getPostByTitle($title)
    {
        return self::where('title', $title)->first();
    }
}
