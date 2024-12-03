<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendamentoTatuagem extends Model
{
    use HasFactory;

    protected $table = 'agendamento_tatuagems';

    protected $fillable = [
        'tatuagem',
        'data',
        'hora',
        'nome',
        'email',
        'telefone',
    ];
}
