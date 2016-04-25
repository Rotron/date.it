<?php

namespace App\Http\Controllers;

use App\Lease;
use Illuminate\Http\Request;

use App\Http\Requests;

class LeasesController extends Controller
{
    //
    public function index() {
        $leases = Lease::all();
        return view('leases.index', ['leases' => $leases]);
    }

    public function new() {
        return view('leases.new');
    }
}
