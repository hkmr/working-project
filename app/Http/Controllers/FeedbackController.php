<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Feedback;


class FeedbackController extends Controller
{
    // feedback form submit

    public function store(Request $request){
        $this ->validate($request, array(
            'username' =>'required|min:3',
            'email' =>'required|email|',
            'message' =>'required|min:10'
            ));

        // storing into database

        $feed = new Feedback;

        $feed->username = $request->username;
        $feed->email = $request->email;
        $feed->message = $request->message;

        $feed->save();

        Session::flash('success' , 'Thanks for your suggestion ! we will consider it soon.');

    	return redirect()->route('home');

    }

}
