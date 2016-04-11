<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lease;

class PagesController extends Controller
{
    //

    public function home(){
        $leases = Lease::all();
        return view('pages.home', ['leases' => $leases]);
    }

    public function about(){
        return view('pages.about');
    }
}
