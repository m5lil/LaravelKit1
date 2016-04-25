@extends('admin.layouts.app')

@section('title')
  الأقسام
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')

    {!! Form::open(array('action' => 'CoursesController@store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        {!! Form::label('name', 'إسم الكورس*', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('class'=>'form-control')) !!}
        </div>
    </div>

    

@endsection
