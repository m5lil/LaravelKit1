<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');



Route::group(['middleware' => 'admin'], function () {

  Route::get('/cp', 'AdminController@index');

  ///////////////////////////  Setings  ////////////////////////////
  Route::get('/cp/settings', 'SettingController@index');
  Route::post('/cp/settings', 'SettingController@update');

  ///////////////////////////  Users  //////////////////////////////
  Route::resource('/cp/users', 'UserController', ['except' => ['show']]);
  Route::get('/cp/users/data','UserController@anyData');
  Route::get('/cp/users/{id}/delete', 'UserController@destroy');

  ///////////////////////////  Pages  ///////////////////////////////
  Route::resource('/cp/page','PageController');
  Route::post('/cp/page/{id}/update','PageController@update');
  Route::get('/cp/page/{id}/delete','PageController@destroy');

  ///////////////////////////  Categories  ///////////////////////////////
  Route::resource('/cp/cat','CatController');
  Route::post('/cp/cat/{id}/update','CatController@update');
  Route::get('/cp/cat/{id}/delete','CatController@destroy');

  ///////////////////////////  Products  ////////////////////////////
  Route::resource('/cp/products','ProductsController', ['except' => ['show']]);
  Route::post('/cp/products/{id}/update','ProductsController@update');
  Route::get('/cp/products/{id}/delete','ProductsController@destroy');

  ///////////////////////////  Products  ////////////////////////////
  Route::resource('/cp/sliders','SliderController', ['except' => ['show']]);
  Route::post('/cp/sliders/{id}/update','SliderController@update');
  Route::get('/cp/sliders/{id}/delete','SliderController@destroy');

  ///////////////////////////  Menu  ////////////////////////////////
  Route::resource('/cp/menu','MenuController', ['except' => ['show']]);
  Route::post('/cp/menu/{id}/update','MenuController@update');
  Route::get('/cp/menu/{id}/delete','MenuController@destroy');

  ///////////////////////////  Blog  ////////////////////////////////
  Route::resource('/cp/posts','PostController', ['except' => ['show']]);
  Route::post('/cp/posts/{id}/update','PostController@update');
  Route::get('/cp/posts/{id}/delete','PostController@destroy');
  
  ///////////////////////////  Msg  ////////////////////////////////
  Route::resource('/cp/msg','MsgController',  ['except' => ['create','store']]);
  Route::post('/cp/msg/{id}/update','MsgController@update');
  Route::get('/cp/msg/{id}/delete','MsgController@destroy');



});



Route::group(['middleware' => 'web'], function () {

  Route::auth();

  Route::get('/login/{provider?}',[
      'uses' => 'Auth\AuthController@getSocialAuth',
      'as'   => 'auth.getSocialAuth'
  ]);

  Route::get('/login/callback/{provider?}',[
      'uses' => 'Auth\AuthController@getSocialAuthCallback',
      'as'   => 'auth.getSocialAuthCallback'
  ]);

  Route::get('/profile', 'HomeController@index');

  Route::get('/home', 'HomeController@index');

    //users profile
  Route::get('/user/{id}','UserController@author')->where('id', '[0-9]+');
  // display list of posts
  Route::get('/user/{id}/posts','UserController@user_posts')->where('id', '[0-9]+');

  Route::get('/user/{id}/all-posts','UserController@user_posts_all');
  // display user's drafts
  Route::get('/user/{id}/drafts','UserController@user_posts_draft');
  // display single post
  Route::get('/posts/{slug}','PostController@show')->where('slug', '[A-Za-z0-9-_]+');

  Route::post('/comment/add','CommentController@store');
  // delete comment
  Route::post('/comment/delete/{id}','CommentController@distroy');
  // delete comment
  Route::get('/{slug}', 'PageController@show')->where('slug', '[A-Za-z0-9-_]+');

  Route::get('/cat/{slug}', 'CatController@show')->where('slug', '[A-Za-z0-9-_]+');

  Route::get('/contact','MsgController@create');

  Route::post('/contact','MsgController@store');
});
