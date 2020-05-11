<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $dates = ['created_at'];
    
    protected $fillable = [
        'market_id', 'client_id','canceled','home_delivery'
    ];

    public function orderitems() {
        //po mojej stronie jest "jeden"
        return $this -> hasMany(OrderItem::class);
    }
    public function homedeliveries() {
        //po mojej stronie jest "jeden"
        return $this -> hasMany(HomeDelivery::class);
    }

    public function client() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Client::class);
    }
    public function market() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Market::class);
    }
}
