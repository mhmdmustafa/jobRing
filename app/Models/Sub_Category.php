<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $fillable = [
        'name', 'active', 'created_at','updated_at'
    ];

    protected $hidden = ['created_at','updated_at'] ;

    public $timestamps = false ;

    public function category_SUB(){

        return $this -> hasOne('App\Models\Category','category_id','id');
    }}
