<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
  
    protected $fillable=['name','desc','price','diff_dates'];
  
    public function payments() {
      //ma wiele płatności
      // po mojej stronie jest jeden Plan
      return $this->hasMany(Payment::class);
    }
}
