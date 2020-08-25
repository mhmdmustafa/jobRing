<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name', 'active', '	type','categories_id','created_at','updated_at'
    ];

    protected $hidden = ['created_at','updated_at'] ;

    public $timestamps = false ;


    public function category(){

        return $this -> hasMany('App\Models\Category','category_id','id');
    }
}
