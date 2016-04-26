<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = ['name', 'location', 'description'];

    public function user() {
        return $this->hasMany('App\User');
    }
}
