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
  Route::post('/cp/page/{p_slug}/update','PageController@update');
  Route::get('/cp/page/{p_slug}/delete','PageController@destroy');

  ///////////////////////////  Products  ////////////////////////////
  Route::resource('/cp/products','ProductsController', ['except' => ['show']]);
  Route::post('/cp/products/{id}/update','ProductsController@update');
  Route::get('/cp/products/{id}/delete','ProductsController@destroy');

  ///////////////////////////  Menu  ////////////////////////////////
  Route::resource('/cp/menu','MenuController', ['except' => ['show']]);
  Route::post('/cp/menu/{id}/update','MenuController@update');
  Route::get('/cp/menu/{id}/delete','MenuController@destroy');

  ///////////////////////////  Blog  ////////////////////////////////
  Route::resource('/cp/posts','PostController', ['except' => ['show']]);
  Route::post('/cp/posts/{id}/update','PostController@update');
  Route::get('/cp/posts/{id}/delete','PostController@destroy');
  


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

});
