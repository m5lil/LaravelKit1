<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Posts;
use App\Comments;
use Redirect;

class CommentController extends Controller
{
	public function store(Request $request)
	{
		//on_post, from_user, body
		$input['from_user'] = $request->user()->id;
		$input['on_post'] = $request->input('on_post');
		$input['body'] = $request->input('body');
		$slug = $request->input('slug');
		Comments::create( $input );
		return redirect('/posts/' . $slug)->with('message', 'Comment published');     
	}

	public function destroy($id)
	{
		Comments::destroy($id);
		return redirect('cp/products');
	}

}
