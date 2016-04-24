@extends('admin.layouts.app')

@section('title')
  القوائم
@endsection

@section('section.content')
  {!! Form::open(array('action' => 'MenuController@store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

   <div class="form-group">
      {!! Form::label('title', 'الاسم*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
      </div>
   </div>
   <div class="form-group">
      {!! Form::label('url', 'الرابط*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::text('url', old('url'), array('class'=>'form-control')) !!}
      </div>
   </div>
   <div class="form-group">
      {!! Form::label('order', 'الترتيب*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::text('order', old('order'), array('class'=>'form-control')) !!}
      </div>
   </div>
   <div class="form-group">
      {!! Form::label('parent_id', 'parent*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::select('parent_id', $menus , 0, array('class'=>'form-control')) !!}
      </div>
   </div>

<div class="panel-footer">
  <div class="input-group">

  </div>
</div>
</div>

@endsection




