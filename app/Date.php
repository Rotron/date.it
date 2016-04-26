<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //

    protected $fillable = ['date', 'description', 'location', 'proposed_by', 'proposed_to', 'valid'];

    public function proposed_by(){
        $user = User::find($this->proposed_by);
        return $user;
    }

    public function proposed_to(){
        $user = User::find($this->proposed_to);
        return $user;
    }
}
