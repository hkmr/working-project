<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Mail\BlogMail;

Route::get('blog/{slug}', [ 'as' => 'blog.single', 'uses'=> 'BlogController@getSingle' ])
-> where('slug' , '[\w\d\-\_]+');
Route::get('/', 'PagesController@getIndex')->name('home');

Route::get('blog', ['uses' => 'BlogController@getIndex' ,'as' => 'blog.index']);

Route::get('contact','PagesController@getContact');

Route::post('contact','PagesController@postContact');

Route::get('about','PagesController@getAbout');

Route::get('terms','PagesController@getTerms');

Route::resource('profile','ProfileController');

Route::resource('posts','PostController');

//Authentication routes
Auth::routes();
// changed in the method form post to get of logout route
// /vendor/laravel/framework/src/Illuminate/Routing/Router.php
// Route::get('/logout', 'Auth\LoginController@logout');

// socialite - social login route
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

//category route
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//subscribe
Route::resource('subscribe', 'SubscribeController');
// feedback
Route::resource('feedback', 'FeedbackController');

//tags route
Route::resource('tags', 'TagController', ['except' => ['create']]);

// comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::get('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);


// routes for like button
Route::get('product/like/{id}', ['as' => 'product.like', 'uses' => 'LikeController@likeProduct']);
Route::get('post/like/{id}', ['as' => 'post.like', 'uses' => 'LikeController@likePost']);