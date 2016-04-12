<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    //

    protected $fillable = ['name', 'address', 'city_id', 'size', 'rooms', 'price', 'charges', 'description', 'occupied_since', 'location'];

    public function city() {
        return $this->belongsTo('App\City');
    }
}
