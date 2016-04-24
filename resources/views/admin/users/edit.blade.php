@extends('admin.layouts.app')

@section('title')
  الأعضاء
@endsection

@section('section.content')
  {!! Form::model($user, ['route' => ['cp.users.update' , $user->id], 'method' => 'PATCH','class' => 'form-horizontal']) !!}
  
        <img src="{{ isset($user->avatar) ? $user->avatar : Gravatar::get($user->email) }}" alt="" />

        @include('admin.users.form')

  {!! Form::close() !!}
@endsection
