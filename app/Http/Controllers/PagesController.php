<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use App\Category;
use App\User;
use Session;

class PagesController extends Controller {

	public function getIndex(){
		$posts = Post::orderBy('created_at','desc')->limit(5)->paginate(4);
		$categories = Category::orderBy('created_at','desc')->take(4)->get();
		$populars =Post::orderBy('views','desc')->paginate(5);
		$user = User::all();
		$topcategories = Category::orderBy('created_at','desc')->take(15)->get();

		return view('pages.welcome')->withPosts($posts)->withCategories($categories)->withPopulars($populars)
		->withUser($user)->withTopcategories($topcategories);
	}

	public function getAbout(){
		
		# to pass var to page use with() function with the view().
		# to pass a simple varible -------- use ->with("varNameToUseInPage", $varNameToPass);
		# Eg.  ---- >           return view('pages.about') ->with("fullname",$full);

		# or use shortcut method as ------------  useVarNameTOUseInPage($varNameToPass);
		# Eg. --->    	return view('pages.about') ->withFullname($full);

		# to pass the array we can use the withData($arrayName) function with view();
		#Eg. ---->    return view('pages.about') ->withData($arrayName);


		return view('pages.about');
	}

	public function getTerms(){

		return view('pages.terms');
	}

	public function getContact(){
		return view('pages.contact');
	}

	public function postContact(Request $request) {

			$this->validate($request, [
				'email' => 'required|email',
				'subject' => 'required|min:3',
				'message' => 'required|min:10']);

			$data = array(
				'email' => $request->email,
				'subject' => $request->subject,
				'bodyMessage' => $request->message
				);

			Mail::send('emails.contact', $data, function($message) use($data){
				$message->from($data['email']);
				$message->to('mailtwebox@gmail.com');
				$message->subject($data['subject']);
			});

			Session::flash('success', 'Your email has been successfully send!');

			return redirect('/');
	}

}