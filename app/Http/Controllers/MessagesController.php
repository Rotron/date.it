<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    //

    public function send(Request $request) {
        $message = Message::create([
            'from' => Auth::user()->id,
            'to' => $request->input('to'),
            'topic' => $request->input('topic'),
            'body' => $request->input('body')
        ]);

        return redirect('/users/home');
    }

    public function delete($id) {
        $message = Message::find($id);
        $message->delete();

        return redirect('/users/home');
    }
}
