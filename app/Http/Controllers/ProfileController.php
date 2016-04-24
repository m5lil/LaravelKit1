<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use Datatables;


class ProfileController extends Controller
{
    public function index(Request $request)
    {

		return view('admin.profiles.index');
	}

	public function show($id)
    {
        $profile = Profile::find($id);
        return view('profile', compact('profile'));
    }


	/**
	 * Show the form for creating a new profiles
	 *
     * @return \Illuminate\View\View
	 */
	

	public function create()
	{


	    return view('admin.profiles.create');
	}

	/**
	 * Store a newly created profiles in storage.
	 *
     * @param CreateProfileRequest|Request $request
	 */
	public function store(Request $request)
	{
    	$request = $this->saveFiles($request);
		$profile = Profile::create($request->all());
		$profile->courses()->attach($request->input('courses'));
		return redirect('cp/profiles');
	}

	/**
	 * Show the form for editing the specified profiles.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$profiles = Profile::find($id);
		return view('admin.profiles.edit', compact('profiles'));
	}

	/**
	 * Update the specified profiles in storage.
     * @param UpdateProfileRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, Request $request)
	{
		$profiles = Profile::findOrFail($id);
		
        $request = $this->saveFiles($request);
		$profiles->update($request->all());
		$profiles->courses()->sync($request->input('courses'));

		return redirect('cp/profiles');
	}

	/**
	 * Remove the specified profiles from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Profile::destroy($id);

		return redirect('cp/profiles');
	}

  public function anyData(Profile $profile)
  {
    $profiles = $profile->select('id', 'trainer_id', 'name', 'phone', 'email');
      return Datatables::of($profiles)
        ->editColumn('name', function($model){
          return \Html::link('/cp/profiles/' . $model->id . '/edit', $model->name);
        })
        ->editColumn('control', function($model){
              $all = '<a class="btn btn-default" href="/cp/profiles/' . $model->id . '/edit"><i class = "ion ion-edit"></i></a> ';
              $all .= '<a class="btn btn-default" href="/cp/profiles/' . $model->id . '/delete"><i class = "ion ion-trash-a"></i></a>';
          return $all;
        })
      ->make(true);

  }






}
