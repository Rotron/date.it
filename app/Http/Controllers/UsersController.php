<?php

namespace App\Http\Controllers;

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
        return view('users.create');
    }

    public function save(Request $request) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'admin' => false
        ]);

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
