<?php

namespace App;

use Carbon\Carbon;
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
        return $this->belongsTo('App\City');
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

    public function dates_proposed() {
        $dates = Date::where('proposed_by', $this->id)
                        ->where('date', '>', Carbon::today())
                        ->get();
        return $dates;
    }

    public function dates_offered() {
        $dates = Date::where('proposed_to', $this->id)
            ->where('date', '>', Carbon::today())
            ->get();
        return $dates;
    }
}
