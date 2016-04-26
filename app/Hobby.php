<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    //

    protected $fillable = ['name' , 'description', 'picture'];

    public function user() {
       return $this->belongsToMany('App\User');
    }
}
