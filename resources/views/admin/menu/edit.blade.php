@extends('admin.layouts.app')

@section('title')
  القوائم
@endsection


@section('section.content')

   {!! Form::model($menu, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('cp.menu.update', $menu->id))) !!}
   <div class="form-group">
      {!! Form::label('title', 'الاسم*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::text('title', null, array('class'=>'form-control')) !!}
      </div>
   </div>
   <div class="form-group">
      {!! Form::label('url', 'الرابط*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::text('url', null, array('class'=>'form-control')) !!}
      </div>
   </div>
   <div class="form-group">
      {!! Form::label('order', 'الترتيب*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::text('order', null, array('class'=>'form-control')) !!}
      </div>
   </div>
   <div class="form-group">
      {!! Form::label('parent_id', 'parent*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
         {!! Form::select('parent_id', $menus ,null, array('class'=>'form-control')) !!}
      </div>
   </div>

@endsection
