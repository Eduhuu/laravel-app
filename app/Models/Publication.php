<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';

    protected $fillable = [
        'title',
        'image',
        'content',
        'autor_id',
        'blocked',
    ];

    protected $casts = [
        'blocked' => 'boolean',
    ];

    // **Relaciones**

    // Una publicación pertenece a un autor (usuario)
    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    // Una publicación puede tener muchos comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function commentCant()
    {
        return $this->comments()->count(); 
    }
}
