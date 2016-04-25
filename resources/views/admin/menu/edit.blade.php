@extends('admin.layouts.app')

@section('title')
  القوائم
@endsection

@section('css')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
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
         {!! Form::select('url', array_add(\App\Page::lists('name','slug'), 'external', $menu->url), 'external', array('id'=>'a', 'class'=>'form-control')) !!}
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
@section('js')
  <script src="{{ asset('/js/select2.min.js') }}"></script>
  <script type="text/javascript">
    $('#a').select2({
      placeholder: 'أكتب الرابط أو إختر الصفحة',
      tags : true
    });
  </script>

@endsection