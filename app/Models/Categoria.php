<?php

namespace agendaweb\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable=[
        'descricao'

    ];

    public function participantes(){
      return  $this->hasMany(Participante::class);
    }
}
