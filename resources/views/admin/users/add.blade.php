@extends('admin.layouts.app')

@section('title')
  الأعضاء
@endsection

@section('section.content')
  {!! Form::open(['action' => 'UserController@store', 'method' => 'post','class' => 'form-horizontal']) !!}
    <div class="panel panel-default ">
      <div class="panel-heading"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>@yield('title')</div>
      <div class="panel-body">

        @include('admin.users.form')
        
      </div>

      <div class="panel-footer">
        <div class="input-group">
            <input type="submit" name="submit" value="حفظ" class="btn btn-success btn-md btn-block">
        </div>
      </div>
    </div>
  {!! Form::close() !!}
@endsection
