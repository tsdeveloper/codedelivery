<?php

namespace agendaweb\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    //
    protected $fillable=[
        'nome',
        'cpf',
        'email',
        'categoria_id',

    ];

    public function categoria(){
        return $this->belongsTo(categoria::class);
    }
}
