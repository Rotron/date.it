<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

use App\Http\Requests;

class CitiesController extends Controller
{
    //
    public function index(){
        $cities = City::all();
        return view('cities.index', ['cities' => $cities]);
    }

    public function create() {
        return view('cities.create');
    }

    public function save(Request $request) {
        $city = City::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'location' => $request->input('city-lat').','.$request->input('city-lon')
        ]);

        $picture = $request->file('picture');
        $picture->move(public_path().'/img/cities/', $request->input('name').'.jpg');
        $city->picture = $request->input('name');
        $city->save();

        return redirect('/admin/home');
    }

    public function modify($id){
        $city = City::find($id);
        return view('cities.modify', ['city' => $city]);
    }

    public function update(Request $request) {
        
    }
}
