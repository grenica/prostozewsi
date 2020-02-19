<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Farmer extends Model
{
    protected $fillable=[
        'name','phone','city','number',
        'lat','lon','user_id','region_id',
        'image'
];
 
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function region() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Region::class);
    }

    public function articles() {
        //po mojej stronie jest "jeden"
        return $this -> hasMany(Article::class);
    }

    public function payments() {
        //po mojej stronie jest "jeden"
        return $this -> hasMany(Payment::class);
    }

    public function markets() {
        return $this->belongsToMany(Market::class);
        }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}
