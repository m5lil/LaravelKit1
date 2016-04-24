@extends('admin.layouts.app')

@section('title')
  الصفحات
@endsection

@section('section.content')

{!! Form::open(array('files' => true, 'action' => 'SliderController@store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('name', 'الإسم*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('order', 'الترتيب*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('order', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('photo', 'الصورة*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('photo') !!}
        {!! Form::hidden('photo_w', 4096) !!}
        {!! Form::hidden('photo_h', 4096) !!}
         
    </div>
</div>

<div class="form-group">
    {!! Form::label('caption', 'المحتوى', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('caption', null, array('class'=>'form-control ckeditor')) !!}
    </div>
</div>


@endsection
