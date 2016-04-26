<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'picture', 'city_id', 'sex', 'looking_for'
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

    public function hobby() {
        return $this->belongsToMany('App\Hobby');
    }

    public function messages_sent() {
        $messages = Message::where('from', $this->id)->get();

        return $messages;
    }

    public function messages_received() {
        $messages = Message::where('to', $this->id)->get();

        return $messages;
    }
}
