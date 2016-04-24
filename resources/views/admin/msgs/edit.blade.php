
@extends('admin.layouts.app')

@section('title')
  الرسائل
@endsection

@section('section.content')
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

@endsection
