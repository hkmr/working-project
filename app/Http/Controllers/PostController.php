<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //excrating all the posts from database and stroing into variable
        $posts = Post::orderBy('id','desc')->where('user_id',Auth::user()->id)->paginate(10);
        $populars = Post::orderBy('views', 'desc')->paginate(5);
        $categories = Category::orderBy('created_at','desc')->take(4)->get();
        $user = User::all();

        //returning a view and passing it to the variable
        return view('posts.index')->withPosts($posts)->withPopulars($populars)->withCategories($categories)->withUser($user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // validating the form data before storing into database

        $this -> validate($request, array(
                'title'         =>  'required|max:255|unique:posts,title',
                // 'slug'          =>  'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   =>  'required|integer',
                'body'          =>  'required',
                'featured_image'=>  'sometimes|image|max:1012'
            ));

        //Storing the data to the database

        $post = new Post;
        $replace =array(" ","?","/","[","]","<",">","{","}","|","^","`",";",":","@","&","=","+","$",",","'",".");
        $slug = str_ireplace($replace , "-", $request->title);

        $post -> title          =$request->title;
        $post -> slug           =$slug;
        $post -> category_id    =$request->category_id;        
        $post -> user_id        =auth()->user()->id;
        $post -> body           =Purifier::clean($request->body);

        // saving images
        if($request->hasFile('featured_image')) {

            $image =$request->file('featured_image');
            $fileName = time(). '.' .$image->getClientOriginalExtension();
            $location =public_path('images/blog/'. $fileName);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $fileName;
        }


        $post ->save(); //for saving the items

        $post->tags()->sync($request->tags,false);

        Session::flash('success' , 'The blog post has been Successfully saved!');

        //after submiting redirect to show

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::find($id);
        $categories = Category::orderBy('created_at','desc')->take(4)->get();
        $users=User::all();

        if ($post->user_id == Auth::user()->id) {

            return view('posts.show')->withPost($post)->withCategories($categories)->withUsers($users);
        }
        else {

            return redirect('/');
        }

         //finding post using post id
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //storing the post into the variable
        $post = Post::find($id);    //finding the post using id no

        if ($post->user_id == Auth::user()->id) {
            
            $categories = Category::all();
            $cats =array();

            foreach ($categories as $category) {
                $cats[$category->id] = $category->name;
            }

            $tags =Tag::all();
            $tags2 = array();

            foreach ($tags as $tag) {
                $tags2[$tag->id] = $tag->name;
            }


            //returing the view
            return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);

        }
        else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

            //validating the data 
            $this -> validate($request, array(
                'title' => 'required|max:255',
                // 'slug' =>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body' => 'required',
                'featured_image' => 'image|max:1000'
            ));

        $replace =array(" ","?","/","[","]","<",">","{","}","|","^","`",";",":","@","&","=","+","$",",","'",".");
        $slug = str_ireplace($replace , "-", $request->title);
        //saving the data to the database

        $post->title = $request->input('title');
        $post->slug =$slug;
        $post->category_id =$request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {
            //adding new photo
            $image =$request->file('featured_image');
            $fileName = time(). '.' .$image->getClientOriginalExtension();
            $location =public_path('images/blog/'. $fileName);
            Image::make($image)->resize(800,400)->save($location);
            $oldFileName =$post->image;

            // update the database
            $post->image = $fileName; 

            // delete the old fileName
            Storage::delete('blog/'.$oldFileName);
        }

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }
        else{
            $post->tags()->sync(array());
        }
        

        //setting flash massage to display success Msg
        Session::flash('success', 'Successfully Saved !');

        //redirect with flash msg to show the post
        return redirect()-> route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //deleting the post
        $post = Post::find($id);
        $post->tags()->detach();
        
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The post has been Successfully deleted');

        return redirect()-> route('posts.index');
    }
}
