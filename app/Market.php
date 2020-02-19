<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Market extends Model
{
    
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable=[
      'name','city','lat','lon',
  ];

  public function farmers() {
    return $this->belongsToMany(Farmer::class);
    }
}
