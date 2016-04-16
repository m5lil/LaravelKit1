<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests;

class MenuController extends Controller
{
    public function index()
    {
    	$menus = Menu::orderBy('order','asc')->get();
        return view('admin.menu.index',compact('menus'));
    }


    public function create()
    {
        $menus = Menu::lists('title', 'id');
        $menus = array_add($menus, '0', 'بدون');
        return view('admin.menu.create',compact('menus'));
    }


    public function store(Request $request)
    {
        $input = $request->except('_token');
        $menu = new Menu();
        $menu->parent_id = $input['parent_id'];
        $menu->title = $input['title'];
        $menu->url = $input['url'];
        $menu->order = $input['order'];
        $menu->save();

        return redirect('cp/menu');
    }


    public function edit($id)
    {
        $menu = Menu::findOrfail($id);
        $menus = Menu::lists('title', 'id');
        $menus = array_add($menus, '0', 'بدون');
        return view('admin.menu.edit',compact('menu','menus'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $menu = Menu::findOrfail($id);
        $menu->parent_id = $input['parent_id'];
        $menu->title = $input['title'];
        $menu->url = $input['url'];
        $menu->order = $input['order'];
        $menu->save();

        return redirect('cp/menu');
    }

    public function destroy($id)
    {
     	$menu = Menu::findOrfail($id);
     	$menu->delete();
        return redirect('cp/menu');
    }


}
