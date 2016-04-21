
@extends('admin.layouts.app')

@section('title')
  الصفحات
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')
    <div class="panel panel-default ">
      <div class="panel-heading"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>@yield('title')</div>
      <div class="panel-body">
        <form method = 'get' action = '{{url('/cp/msg')}}'>
            <button class = 'btn btn-danger'>msg Index</button>
        </form>
        <br>
        <form method = 'POST' action = '{{url('/cp/msg/').'/'.$msg->id}}/update'>

            <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

            <div class="form-group">
                <label for="name">name</label>
                <input id="name" name = "name" type="text" class="form-control" value="{{$msg->name}}">
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input id="email" name = "email" type="text" class="form-control" value="{{$msg->email}}">
            </div>

            <div class="form-group">
                <label for="phone">phone</label>
                <input id="phone" name = "phone" type="text" class="form-control" value="{{$msg->phone}}">
            </div>

            <div class="form-group">
                <label for="content">content</label>
                <textarea id="content" name = "content" class="form-control" >{{$msg->content}}</textarea>
            </div>

            <button class = 'btn btn-primary from-control' type ='submit'>Update</button>

        </form>
      </div>

      <div class="panel-footer">
        <div class="input-group">

        </div>
      </div>
    </div>

@endsection
