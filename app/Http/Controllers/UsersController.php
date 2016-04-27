<?php

namespace App\Http\Controllers;

use App\City;
use App\Hobby;
use App\User;
use App\Message;
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
        $messages_sent = $user->messages_sent();
        $messages_received = $user->messages_received();
        $dates_proposed = $user->dates_proposed();
        $dates_offered = $user->dates_offered();
        return view('users.home', [
                'user' => $user,
                'hobbies' => $hobbies,
                'cities' => $cities,
                'messages_sent' => $messages_sent,
                'messages_received' => $messages_received,
                'dates_offered' => $dates_offered,
                'dates_proposed' => $dates_proposed
        ]);
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
            'city_id' => ($request->input('city_id') ? $request->input('city_id') : 1),
            'looking_for' => $request->input('looking_for'),
            'password' => Hash::make($request->input('password')),
            'admin' => false
        ]);

        if($request->file('picture')){
            $picture = $request->file('picture');
            $picture->move(public_path() . '/img/users/', $user->id.'.jpg');
            $user->picture = $user->id.'.jpg';
        }

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
            $potentials = User::where('sex', $user->looking_for)
                                ->where('looking_for', $user->sex)
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
