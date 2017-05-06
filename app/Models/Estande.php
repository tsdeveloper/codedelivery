<?php

namespace agendaweb\Models;

use Illuminate\Database\Eloquent\Model;

class Estande extends Model
{
    //
    protected $fillable=[
        'participante_id',
        'nome',
        'descricao',
        'ativo'

    ];
}
