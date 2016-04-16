<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\AddUserRequestAdmin;
use Datatables;

class UserController extends Controller
{

  public function index()
  {
    // $user = User::all();
    return view('admin.users.index',compact('user'));
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
          $all = '<a href="/cp/users/' . $model->id . '/edit">Edit</a>';
          $all .= '<a href="/cp/users/' . $model->id . '/delete">Delete</a>';
          return $all;
        })
      ->make(true);

  }



}
