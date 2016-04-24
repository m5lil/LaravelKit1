<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Msg;
use App\Http\Requests;
use Validator;
use Session;
use Datatables;

// use App\Http\Requests\MsgRequest;

class MsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.msgs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            Session::put('errors', $validator->messages()); 
            return redirect('/contact');
        }
        
        $msg = new Msg();
        $msg->name = $input['name'];
        $msg->email = $input['email'];
        $msg->phone = $input['phone'];
        $msg->content = $input['content'];
        $msg->save();
        Session::put('message', 'تمام كده .. هنرجع نرد عليك فى أقرب وقت ممكن!'); 
        return redirect('/contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = Msg::findOrfail($id);
        return view('admin.msgs.show',compact('msg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $msg = Msg::findOrfail($id);
        return view('admin.msgs.edit',compact('msg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $msg = Msg::findOrfail($id);
        $msg->name = $input['name'];
        $msg->email = $input['email'];
        $msg->phone = $input['phone'];
        $msg->content = $input['content'];
        $msg->save();

        return redirect('cp/msg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Msg::destroy($id);
        return redirect('cp/msg');
    }


    public function anyData()
    {

        $msg = Msg::select('id', 'name', 'email', 'phone');
          return Datatables::of($msg)
            ->editColumn('name', function($model){
              return \Html::link('/cp/msg/' . $model->id , $model->name);
            })
            ->editColumn('control', function($model){
              $all = '<a class="btn btn-default" href="/cp/msg/' . $model->id . '"><i class = "ion ion-paper-airplane"></i></a> ';
              // $all .= '<a class="btn btn-default" href="/cp/msg/' . $model->id . '/edit"><i class = "ion ion-edit"></i></a> ';
              $all .= '<a class="btn btn-default" href="/cp/msg/' . $model->id . '/delete"><i class = "ion ion-trash-a"></i></a>';
              return $all;
            })
          ->make(true);

    }




}
