<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function city() {
        return $this->hasOne('App\City');
    }

    public function lease() {
        return $this->hasOne('App\Lease', 'tenant_id');
    }

    public function leases() {
        return $this->hasMany('App\Lease', 'landlord_id');
    }
}
