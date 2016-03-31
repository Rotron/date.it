<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    //

    protected $fillable = ['name', 'address', 'city_id', 'size', 'rooms', 'price', 'charges', 'description', 'location'];
}
