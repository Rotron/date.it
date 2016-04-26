<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class HobbiesController extends Controller
{
    //

    public function create() {
        return view('hobbies.create');
    }

    public function save(Request $request) {
        $hobby = Hobby::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $picture = $request->file('picture');
        $picture->move(public_path().'/img/hobbies/', $request->input('name').'.jpg');
        $hobby->picture = $request->input('name').'.jpg';
        $hobby->save();

        return redirect('/admin/home');
    }

    public function modify($id){
        $hobby = Hobby::find($id);
        return view('hobbies.modify', ['hobby' => $hobby]);
    }

    public function update(Request $request){
        $hobby = Hobby::find($request->input('id'));
        $hobby->name = $request->input('name');
        $hobby->description = $request->input('description');
        if($request->file('picture')){
            $picture = $request->file('picture');
            $picture->move(public_path().'/img/hobbies/', $request->input('name').'.jpg');
            $hobby->picture = $request->input('name').'.jpg';
        }
        $hobby->save();

        return redirect('/admin/home');
    }

    public function delete($id) {
        $hobby = Hobby::find($id);
        $hobby->delete();

        return redirect('/admin/home');
    }

    public function addToUser(Request $request){
        $user = Auth::user();
        $user->hobby()->attach($request->input('hobby_id'));

        return redirect('/users/home');
    }

    public function removeFromUser($id){
        $user = Auth::user();
        $user->hobby()->detach($id);

        return redirect('/users/home');
    }
}
