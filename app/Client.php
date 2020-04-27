<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Client extends Model
{
    protected $fillable=[
        'city','adress','number','phone','user_id','region_id'
    ];
 
    use SoftDeletes;

    public function region() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Region::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function markets() {
        return $this->belongsToMany(Market::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
