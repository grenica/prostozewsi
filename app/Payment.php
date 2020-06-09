<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'stopdata','price','ispaid','istest','farmer_id','plan_id'
    ];

    public function farmer() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Farmer::class);
    }

    public function plan() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Plan::class);
    }
}
