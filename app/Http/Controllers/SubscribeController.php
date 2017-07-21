<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Subscribe;

class SubscribeController extends Controller
{
    public function store(Request $request) {

    	$this -> validate($request, array(
                'email'  =>  'required|email|unique:subscribes,email'
            ));

    	//storing to database

    	$subs = new Subscribe;

    	$subs->email = $request->email;

    	$subs ->save(); //for saving the items

    	Session::flash('success' , 'you are now subscribed to us');

    	return redirect()->route('blog.index');

    }

}
