<?php

namespace App\Http\Controllers;

use App\City;
use App\Hobby;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function home() {
        $user = Auth::user();
        $hobbies = Hobby::all();
        $cities = City::all();
        return view('users.home', ['user' => $user, 'hobbies' => $hobbies, 'cities' => $cities]);
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

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->city_id = $request->input('city_id');
        $user->sex = $request->input('sex');
        $user->looking_for = $request->input('looking_for');
        if($request->file('picture')){
            $picture = $request->file('picture');
            $picture->move(public_path() . '/img/users/', $user->id.'.jpg');
            $user->picture = $user->id.'.jpg';
        }
        $user->save();
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

    public function discover() {
        $user = Auth::user();
        if($user->looking_for == 'b'){
            $potentials = User::where('looking_for', $user->sex)
                                ->orwhere('looking_for', 'b')
                                ->where('city_id', $user->city_id)
                                ->get();
        }
        else {
            $potentials = User::where('looking_for', $user->sex)
                                ->orwhere('looking_for', 'b')
                                ->where('sex', $user->looking_for)
                                ->where('city_id', $user->city_id)
                                ->get();
        }
        return view('users.discover', ['potentials' => $potentials]);
    }

    public function profile($id) {
        $user = User::find($id);
        return view('users.profile', ['user' => $user]);
    }
}
