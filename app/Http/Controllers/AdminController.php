<?php

namespace App\Http\Controllers;

use App\City;
use App\Hobby;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function home() {
        $users = User::all()->take(8);
        $cities = City::all();
        $hobbies = Hobby::all();
        return view('admin.home', ['users' => $users, 'cities' => $cities, 'hobbies' => $hobbies]);
    }
}
