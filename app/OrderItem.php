<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'order_id', 'article_id','quantity','price'
    ];

    public function order() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Order::class);
    }
    public function article() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Article::class);
    }
}
