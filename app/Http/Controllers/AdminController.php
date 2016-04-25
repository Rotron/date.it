<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function home() {
        $users = User::all();
        $cities = City::all();
        return view('admin.home', ['users' => $users, 'cities' => $cities]);
    }
}
