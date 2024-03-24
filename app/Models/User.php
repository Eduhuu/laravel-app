<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Models\Publication;
use App\Models\Comment;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'rol',
        'img',
        'blocked',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'blocked' => 'boolean',
    ];

    // **Relaciones**

    // Un usuario puede tener muchas publicaciones
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    // Un usuario puede tener muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // **Funciones**

    // Obtiene el nombre del rol del usuario
    public function getRol()
    {
        return $this->rol;
    }

    // Verifica si el usuario es administrador
    public function isAdmin()
    {
        return $this->rol === 'admin';
    }
}
