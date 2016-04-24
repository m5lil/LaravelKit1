<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posts;
use App\Http\Requests;
use App\Http\Requests\AddUserRequestAdmin;
use Datatables;

class UserController extends Controller
{

  public function index()
  {
    // $user = User::all();
    return view('admin.users.index');
  }



  public function create()
  {
    return view('admin.users.add');
  }

  protected function store(AddUserRequestAdmin $request, User $user)
    {
      $user->create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
      ]);
      return redirect('/cp/users')->withFlashMessage('تم بنجاح');
    }

    public function edit($id, User $user)
    {
      $user = $user->find($id);
      return view('admin.users.edit', compact('user'));
    }


    public function update($id, User $user, Request $request)
    {
      $userUpdated = $user->find($id);
      $userUpdated->fill($request->all())->save();
      return redirect('/cp/users')->withFlashMessage('Done');
    }


    public function destroy($id, User $user)
    {
      $user->find($id)->delete();
      return redirect('/cp/users')->withFlashMessage('تم بنجاح');
    }



  public function anyData(User $user)
  {
    $users = $user->select('id', 'name', 'email', 'admin')->where('id', '!=', \Auth::id());
      return Datatables::of($users)
        ->editColumn('name', function($model){
          return \Html::link('/cp/users/' . $model->id . '/edit', $model->name);
        })
        ->editColumn('admin', function($model){
          return $model->admin == 0 ? 'user' : 'admin';
        })
        ->editColumn('control', function($model){
              // $all = '<a class="btn btn-default" href="/cp/users/' . $model->id . '"><i class = "ion ion-paper-airplane"></i></a> ';
              $all = '<a class="btn btn-default" href="/cp/users/' . $model->id . '/edit"><i class = "ion ion-edit"></i></a> ';
              $all .= '<a class="btn btn-default" href="/cp/users/' . $model->id . '/delete"><i class = "ion ion-trash-a"></i></a>';
          return $all;
        })
      ->make(true);

  }


  public function user_posts($id)
  {
    //
    $posts = Posts::where('author_id',$id)->where('active',1)->orderBy('created_at','desc')->paginate(5);
    $title = User::find($id)->name;
    return view('user.home')->withPosts($posts)->withTitle($title);
  }

  public function user_posts_all(Request $request)
  {
    //
    $user = $request->user();
    $posts = Posts::where('author_id',$user->id)->orderBy('created_at','desc')->paginate(5);
    $title = $user->name;
    return view('user.home')->withPosts($posts)->withTitle($title);
  }

  public function user_posts_draft(Request $request)
  {
    //
    $user = $request->user();
    $posts = Posts::where('author_id',$user->id)->where('active',0)->orderBy('created_at','desc')->paginate(5);
    $title = $user->name;
    return view('user.home')->withPosts($posts)->withTitle($title);
  }


  public function author(Request $request, $id) 
  {
    $data['user'] = User::find($id);
    $data['comments_count'] = $data['user'] -> comments -> count();
    $data['posts_count'] = $data['user'] -> posts -> count();
    $data['posts_active_count'] = $data['user'] -> posts -> where('active', '1') -> count();
    $data['posts_draft_count'] = $data['posts_count'] - $data['posts_active_count'];
    $data['latest_posts'] = $data['user'] -> posts -> where('active', '1') -> take(5);
    $data['latest_comments'] = $data['user'] -> comments -> take(5);
    return view('user.author', $data);
  }



  




}
