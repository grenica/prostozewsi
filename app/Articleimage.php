<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
