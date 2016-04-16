@extends('admin.layouts.app')

@section('title')
  الأعضاء
@endsection

@section('section.content')
  {!! Form::model($user, ['route' => ['cp.users.update' , $user->id], 'method' => 'PATCH','class' => 'form-horizontal']) !!}
    <div class="panel panel-default ">
      <div class="panel-heading"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>@yield('title')</div>
      <div class="panel-body">

        <img src="{{ isset($user->avatar) ? $user->avatar : Gravatar::get($user->email) }}" alt="" />

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
