<?php

namespace BrindaBrasil\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
       'client_id',
       'user_deliveryman_id',      
       'total',
       'status'
    ];
    public function items() {
        return $this->hasMany(User::class);
    }

    public function deliveryman() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
