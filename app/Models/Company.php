<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'active', '	addres','password','video','email','field_work','created_at','updated_at'
    ];

    protected $hidden = ['created_at','updated_at'] ;

    public $timestamps = false ;


}
