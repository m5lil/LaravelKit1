<?php

namespace App\Http\Controllers;

use Session;

use App\Setting;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller
{

  public function index(Setting $settings)
    {
      $settings = $settings->all();
      return view('admin.setting', compact('settings'));
    }

  public function update(Request $request, Setting $settings)
    {
      foreach (array_except($request->toArray() , ['_token','submit']) as $key => $req) {
        $sitesupdate = $settings->where('set_name', $key)->first();
        $sitesupdate->fill([ 'value' => $req ])->save();
      }
      Session::flash('message', 'This is a message!');
      return redirect('/cp/settings');

    }

}
