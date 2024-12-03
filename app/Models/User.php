<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, Notifiable;

    // Definições de atributos e relacionamentos podem ser feitas aqui
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // Caso tenha adicionado esse campo
    ];

    // Se houver alguma configuração adicional, como casting de campos
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean', // Para garantir que seja um valor booleano
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
