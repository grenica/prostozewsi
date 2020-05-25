<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = ['deleted_at']; 
    protected $fillable = [
        'name', 'price','desc','category_id','farmer_id',
        'unit_id'
    ];
    //'articleimages_id',,'feature_id'

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function articleimages() {
        return $this->hasMany(Articleimage::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function farmer() {
        return $this->belongsTo(Farmer::class);
    }

    public function features() {
        //wiele to wiele
       return $this->belongsToMany(Feature::class);
        // return $this->hasMany(Feature::class);
    }
    public function orderItem() {
       
          return $this->hasMany(OrderItem::class);
      }
}
