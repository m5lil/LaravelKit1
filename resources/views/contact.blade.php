@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                <div class="panel-body">
                
                    @if (Session('message'))
                      <div class="flash alert-info">
                        <p class="panel-body">
                          {{ Session::get('message') }}
                          {{ Session::forget('message')}}
                        </p>
                      </div>
                      @endif

                      @if (count($errors) > 0)
                      <div class='flash alert-danger'>
                        <ul class="panel-body">
                          @foreach ( $errors->all() as $error )
                          <li>
                            {{ $error }}
                            {{Session::forget('errors')}}
                          </li>
                          @endforeach
                        </ul>
                      </div>
                      @endif

                    <form method = 'POST' action = '{{url('/contact')}}'>

                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

                        <div class="form-group">
                            <label for="name">name</label>
                            <input id="name" name = "name" type="text" class="form-control" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input id="email" name = "email" type="text" class="form-control" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input id="phone" name = "phone" type="text" class="form-control" value="{{old('phone')}}">
                        </div>

                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea id="content" name = "content" class="form-control" >{{old('content')}}</textarea>
                        </div>

                        <button class = 'btn btn-primary from-control' type ='submit'>Send</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
