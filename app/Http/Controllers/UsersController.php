<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function home() {
        $user = Auth::user();
        return view('users.home', ['user' => $user]);
    }

    public function create() {
        $cities = City::all();
        return view('users.create', ['cities' => $cities]);
    }

    public function save(Request $request) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'sex' => $request->input('sex'),
            'looking_for' => $request->input('looking_for'),
            'password' => Hash::make($request->input('password')),
            'admin' => false
        ]);

        $picture = $request->file('picture');
        $picture->move(public_path() . '/img/users/', $user->id.'.jpg');
        $user->picture = $user->id.'.jpg';

        $user->save();
        Auth::login($user);

        return redirect('/users/home');
    }

    public function login() {
        return view('users.login');
    }

    public function dologin(Request $request) {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return redirect('/users/home');
        }
        else {
            return redirect('/');
        }
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
