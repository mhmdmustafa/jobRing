<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'active', '	sub_categories_id','created_at','updated_at'
    ];

    protected $hidden = ['created_at','updated_at'] ;

    public $timestamps = false ;

    public function sub_category(){
        return $this -> hasMany('App/Models/Sub_Category','category_id','id');
    }

    public function section(){

        return $this->hasOne('App/Models/Section','category_id','id');
    }
}
