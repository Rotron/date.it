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
        
    }
}
