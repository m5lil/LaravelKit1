@extends('admin.layouts.app')

@section('title')
  الأعضاء
@endsection

@section('section.content')
  {!! Form::open(['action' => 'UserController@store', 'method' => 'post','class' => 'form-horizontal']) !!}

        @include('admin.users.form')
        
  {!! Form::close() !!}
@endsection
