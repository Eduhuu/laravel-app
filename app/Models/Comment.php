<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'content',
        'autor_id',
        'publication_id',
    ];

    protected $casts = [
        // 'creation_date' => 'datetime',
    ];

    // **Relaciones**

    // Un comentario pertenece a un autor (usuario)
    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    // Un comentario pertenece a una publicación
    public function publicacion()
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }
}
