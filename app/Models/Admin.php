<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table='admin';
    protected $guard='admin';

    protected $fillable = [
        'name', 'email', 'password','created_at','updated_at'
    ];

    protected $hidden = ['created_at','updated_at'] ;

    public $timestamps = false ;
}
