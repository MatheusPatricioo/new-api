<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Traits para gerar factories e enviar notificações
    use HasFactory, Notifiable;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Atributos que serão ocultos ao serializar o modelo
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atributos com tipos específicos
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
