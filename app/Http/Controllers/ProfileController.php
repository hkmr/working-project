<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Session;
use Purifier;
use Image;
use Storage;
use App\Category;


class ProfileController extends Controller
{	
	public function __construct()
    {
        $this->middleware('auth',['except'=>'show']);
    }

    public function index(){

		return view('user.profile');
	}

	public function show($id) {

		$user = User::find($id);
		$posts =Post::where('user_id',$id)->orderBy('views','desc')->paginate(10);
        $total_view = 0;
        foreach ($posts as $post) {
            $total_view+=$post->views;
        }
        $categories=[];
        $allPosts = Post::all()->where('user_id',$id);
        foreach ($allPosts as $post) {
            array_push($categories, $post->category->name);
        }
        $categories= array_unique($categories);

        return view('user.show')->withUser($user)->withPosts($posts)->withTotal_view($total_view)->withCategories($categories);

	}

	public function edit($id) {

		$user =User::find($id);

		if ($user->id == Auth::user()->id ) {
			return view('user.edit')->withUser($user);
		}
		else{
			return redirect('/');
		}
		

	}

	public function update(Request $request, $id) {

		$user = User::find($id);

		//validating the data 
            $this -> validate($request, array(
                'info' => 'min:5|required',
                'avatar' => 'sometimes|image|max:2400',
                // 'facebook' => 'sometimes|min:7',
                // 'twitter' => 'sometimes|min:7',
                // 'instagram' => 'sometimes|min:7',
                // 'tumblr' => 'sometimes|min:7',
                // 'youtube' => 'sometimes|min:7',
            ));

        //saving the data to the database

        $user->info =  Purifier::clean($request->input('info'));
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->tumblr = $request->tumblr;
        $user->youtube = $request->youtube;

         // saving images
        if($request->hasFile('avatar')) {

            $image =$request->file('avatar');
            $fileName = time(). '.' .$image->getClientOriginalExtension();
            $location =public_path('images/user-profile/'. $fileName);
            Image::make($image)->resize(200,200)->save($location);
            $oldAvatar = $user->avatar;

            //update the database
            $user->avatar = $fileName;

            //delete the old image
            if($oldAvatar != 'default-avatar.jpg'){
                Storage::delete('user-profile/'.$oldAvatar);
            }
        }
        
        $user->save();

        Session::flash('success', 'Successfully Saved !');

        return redirect()-> route('profile.show', $user->id);
	}	

}