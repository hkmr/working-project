<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use App\Post;
use App\User;

class CategoryController extends Controller
{
    public function __construct(){

        $this->middleware('auth',['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display a view of all categories
        //also having form to create new category

        $categories = Category::orderBy('created_at','desc')->paginate(50);

        return view('categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //storing the new category
        $this-> validate($request , array(
            'name' => 'required|max:255|unique:categories' ));

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success' , 'New Category has been created');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $cats = Category::find($id);
        // $posts = Post::find(['category_id', $id]);
        $posts = Post::orderBy('created_at','desc')->where('category_id','=',$id)->limit(5)->paginate(10);
        $categories = Category::orderBy('created_at','desc')->limit(5)->paginate(10);
        $populars = Post::orderBy('views','desc')->limit(5)->paginate(5);
        $name = Category::find($id);
        $users = User::all();

        return view('categories.show')->withPosts($posts)->withCategories($categories)->withPopulars($populars)->withName($name)->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
