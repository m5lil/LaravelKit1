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

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif

{!! Form::open(array('files' => true, 'action' => 'ProductsController@store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('name', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}
        <p class="help-block">name of product</p>
    </div>
</div><div class="form-group">
    {!! Form::label('photo', 'Photo*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('photo') !!}
        {!! Form::hidden('photo_w', 4096) !!}
        {!! Form::hidden('photo_h', 4096) !!}
         
    </div>
</div><div class="form-group">
    {!! Form::label('content', 'Content', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('content', old('content'), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

      </div>

      <div class="panel-footer">
        <div class="input-group">

        </div>
      </div>
    </div>

@endsection
