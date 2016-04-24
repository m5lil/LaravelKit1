<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use App\Cat;
use Schema;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;

class PostController extends Controller
{
    public function index()
	{
		//fetch 5 posts from database which are active and latest
		$posts = Posts::orderBy('created_at','desc')->paginate(5);
		//page heading
		$title = 'Latest Posts';
		$cats = Cat::lists('name','id')->toArray();
		//return home.blade.php template from resources/views folder
		return view('admin.posts.index')->withPosts($posts)->withTitle($title)->withCats($cats);
	}

	public function create()
	{
		return view('admin.posts.create');
	}

	public function store(Request $request)
	{
		$request = $this->saveFiles($request);
		$post = new Posts();
		$post->title = $request->get('title');
		$post->body = $request->get('body');
		$post->photo = $request->get('photo');
		$post->cat_id = $request->get('cat_id');
		$post->slug = str_slug($post->title);
		$post->author_id = \Auth::user()->id;
		$post->active = 1;
		$post->save();
		return redirect('/cp/posts');
	}


	public function show($slug)
	{
		$post = Posts::where('slug',$slug)->first();
		if(!$post)
		{
		   return redirect('/')->withErrors('requested page not found');
		}
		$comments = $post->comments;
		return view('posts.show')->withPost($post)->withComments($comments);
	}

	public function edit($id)
	{
		$post = Posts::find($id);
		return view('admin.posts.edit', compact('post'));
	}

	public function update(Request $request, $id)
	{
		//
		$post = Posts::find($id);
		// if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
		// {

		  $title = $request->input('title');
		  $slug = str_slug($title);
		  $duplicate = Posts::where('slug',$slug)->first();
		  if($duplicate)
		  {
		    if($duplicate->id != $id)
		    {
		      return redirect('cp/posts/edit/'.$post->slug)->withErrors('Title already exists.')->withInput();
		    }
		    else 
		    {
		      $post->slug = $slug;
		    }
		  }
		  $request = $this->saveFiles($request);
		  $post->title = $title;
		  $post->body = $request->input('body');
		$post->cat_id = $request->get('cat_id');
		  $post->photo = $request->input('photo');

		    $post->active = 1;
		    $landing = 'cp/posts/';
		  $post->save();
		       return redirect($landing);
		// }
		// else
		// {
		//   return redirect('/')->withErrors('you have not sufficient permissions');
		// }
	}


	public function destroy(Request $request, $id)
	{
	//
		$post = Posts::find($id);
		if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
		{
		  $post->delete();
		  $data['message'] = 'Post deleted Successfully';
		}
		else 
		{
		  $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
		}
		return redirect('/cp/posts')->with($data);
	}

}
