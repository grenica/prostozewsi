<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{
    protected $fillable = [
        'name',
    ];


    public function articles () {
        // wiele do wiele
        return $this->belongsToMany(Article::class);
        // return $this->belongsTo(Article::class);
    }
}
