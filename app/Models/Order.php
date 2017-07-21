<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements  Transformable
{
    use TransformableTrait;


    protected $fillable=[
      'client_id',
      'user_deliveryman_id',
       'total',
       'status'
    ];
    public function items() {
        return $this->hasMany(OrderItem::class);
    }

     public function client() {
        return $this->belongsTo(Client::class);
    }



     public function cupom() {
        return $this->belongsTo(Cupom::class);
    }


    public function deliveryman() {
        return $this->belongsTo(User::class,'user_deliveryman_id','id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
    public static function getEnumValues($table, $column)
    {
        $type = DB::select( DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'") )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value )
        {
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }
    public static function getPossibleEnumValues($name){
        $instance = new static; // create an instance of the model to be able to get the table name
        $type = DB::select( DB::raw('SHOW COLUMNS FROM '.$instance->getTable().' WHERE Field = "'.$name.'"') )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach(explode(',', $matches[1]) as $value){
            $v = trim( $value, "'" );
            $enum[] = $v;
        }
        return $enum;
    }
}
