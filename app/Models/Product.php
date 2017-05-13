<?php

namespace BrindaBrasil\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

       protected $fillable=[
        'name',
        'category_id',
        'description',
        'price',
        'barcode',
        'qtd',
        'active'        

    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
