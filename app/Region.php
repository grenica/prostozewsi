<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name'
    ];

    public function farmers()
    {
      return $this->hasMany(Farmer::class);
    }
}
