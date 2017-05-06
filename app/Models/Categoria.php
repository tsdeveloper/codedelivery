<?php

namespace AgendaWeb\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable=[
        'descricao'

    ];

    public function participantes(){
      return  $this->hasMany(Participante::class);
    }

}
