<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Articleimage extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'image','isdefault'
    ];

    public function article() {
        //po mojej stronie jest "wiele"
        return $this -> belongsTo(Article::class);
    }
}
