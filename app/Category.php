<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at']; 
    protected $fillable = [
        'name', 'parent_id'
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id' );
    }

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id' );
    }
    public function articles()
    {
        return $this->hasOne(Article::class);
    }

}
