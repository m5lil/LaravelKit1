<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Posts;
use App\User;
use Redirect;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    public function index()
	{
		//fetch 5 posts from database which are active and latest
		$posts = Posts::orderBy('created_at','desc')->paginate(5);
		//page heading
		$title = 'Latest Posts';
		//return home.blade.php template from resources/views folder
		return view('admin.posts.index')->withPosts($posts)->withTitle($title);
	}

	public function create()
	{
		return view('admin.posts.create');
	}

	public function store(PostFormRequest $request)
	{
		$post = new Posts();
		$post->title = $request->get('title');
		$post->body = $request->get('body');
		$post->slug = str_slug($post->title);
		$post->author_id = $request->user()->id;
		if($request->has('save'))
		{
			$post->active = 0;
			$message = 'Post saved successfully';            
		}            
		else 
		{
			$post->active = 1;
			$message = 'Post published successfully';
		}
		$post->save();
		return redirect('/cp/posts')->withMessage($message);
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
		  $post->title = $title;
		  $post->body = $request->input('body');
		  if($request->has('save'))
		  {
		    $post->active = 0;
		    $message = 'Post saved successfully';
		    $landing = 'cp/posts/';
		  }            
		  else {
		    $post->active = 1;
		    $message = 'Post updated successfully';
		    $landing = 'cp/posts/';
		  }
		  $post->save();
		       return redirect($landing)->withMessage($message);
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
