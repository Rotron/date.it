<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

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
        $city->picture = $request->input('name').'.jpg';
        $city->save();

        return redirect('/admin/home');
    }

    public function modify($id){
        $city = City::find($id);
        return view('cities.modify', ['city' => $city]);
    }

    public function update(Request $request) {
        $city = City::find($request->input('id'));
        $city->name = $request->input('name');
        $city->description = $request->input('description');
        $city->location = $request->input('city-lat').','.$request->input('city-lon');
        if($request->file('picture')){
            $picture = $request->file('picture');
            $picture->move(public_path().'/img/cities/', $request->input('name').'.jpg');
            $city->picture = $request->input('name').'.jpg';
        }
        $city->save();

        return redirect('/admin/home');
    }

    public function delete($id) {
        $city = City::find($id);
        $city->delete();

        return redirect('/admin/home');
    }
}
