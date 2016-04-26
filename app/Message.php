<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = ['topic', 'body', 'from', 'to'];

    public function sender(){
        $user = User::find($this->from);
        return $user;
    }

    public function receiver(){
        $user = User::find($this->to);
        return $user;
    }
}
