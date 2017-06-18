<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth');
    }


    public function index($id)
    {
        //
        $user =  User::find($id);;
        return view('messages.index')->withUser($user);
    }

    public function send(Request $request)
    {
        //
        $this->validate($request, array (
            'body' => 'min:10',


        ));

        $message = new Message;

        $message->body = $request->body;
        $message->user_id = Auth::user()->id;
        $message->to_id = $request->to_id;
        $message->save();



        Session::flash('success', 'Message has been sent');

        return redirect()->route('test');
    }

    public function inbox (){

        $me = Auth::user();
        $users = User::all();



        $messages = DB::table('messages')->where('to_id', $me->id)->get();

        $senders = DB::table('messages')->pluck('user_id');

        foreach ($senders as $sender) {
            $qwe = $sender;
        }


       $user = User::find($qwe);




        return view('messages.inbox')->withMessages($messages)->withUser($user);




    }
}
