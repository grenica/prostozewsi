<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeDelivery extends Model
{
    protected $fillable = [
        'order_id', 'date','time_start','price','message'
    ];

    public function order() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Order::class);
    }
}
