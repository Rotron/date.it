<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Date;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DatesController extends Controller
{
    //public function create($id){
    public function create($id){
        $user = User::find($id);
        return view('dates.create', ['user' => $user]);
    }


    public function save(Request $request){
        $date = Date::create([
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'location' => $request->input('date-lat').','.$request->input('date-lon'),
            'proposed_by' => Auth::user()->id,
            'proposed_to' => $request->input('proposed_to'),
            'valid' => false
        ]);

        return redirect('/users/home');
    }


    public function delete($id){
        $date = Date::find($id);
        $date->delete();

        return redirect('/users/home');
    }

    public function accept($id){
        $date = Date::find($id);
        $date->valid = true;
        $date->save();

        return redirect('/users/home');
    }
}
