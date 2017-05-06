<?php

namespace AgendaWeb\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Participante extends Model implements Transformable
{
    use TransformableTrait;

   //
    protected $fillable=[
        'nome',
        'cpf',
        'email',
        'categoria_id',
         'user_id',
        

    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

     public function user(){
        return $this->hasOne(User::class);
    }

}
