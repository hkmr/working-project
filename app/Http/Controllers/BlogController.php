<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class BlogController extends Controller
{

	public function getIndex(){

        $posts=Post::orderBy('views','desc')->paginate(10);
		$recents=Post::orderBy('created_at','desc')->paginate(5);
        $categories = Category::orderBy('created_at','desc')->take(4)->get();
        $user = new User;

		return view('blog.index')->withPosts($posts)->withRecents($recents)->withCategories($categories)->withUser($user);
	}

    public function getSingle($slug){

    	//fetching from database based on slug
    	$post = Post::where('slug' , '=', $slug)->first();
        $post->increment('views'); 
        $user = new User;
        $populars=Post::orderBy('views','desc')->paginate(5);
        $categories = Category::orderBy('created_at','desc')->take(4)->get();
        $posts =Post::all();
        $users=User::all();
        

    	//returning the view
    	return view('blog.single')->withPost($post)->withPopulars($populars)->withCategories($categories)->withUser($user)->withPosts($posts)->withUsers($users);
    }
}
