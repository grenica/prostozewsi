<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
    ];

    public function articles() {
        return $this -> hasMany(Article::class);
    }
}
