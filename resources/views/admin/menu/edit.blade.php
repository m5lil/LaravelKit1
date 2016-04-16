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



{!! Form::model($menu, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('cp.menu.update', $menu->id))) !!}


<div class="form-group">
    {!! Form::label('title', 'title*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title', old('title',$menu->title), array('class'=>'form-control')) !!}
        <p class="help-block">title of product</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('url', 'url*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('url', old('url',$menu->url), array('class'=>'form-control')) !!}
        <p class="help-block">url of product</p>
    </div>
</div>


<div class="form-group">
    {!! Form::label('order', 'order*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('order', old('order',$menu->order), array('class'=>'form-control')) !!}
        <p class="help-block">order of product</p>
    </div>
</div>


<div class="form-group">
    {!! Form::label('parent_id', 'parent_id*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('parent_id',$menus ,$menu->parent_id, array('class'=>'form-control')) !!}
        <p class="help-block">parent of product</p>
    </div>
</div>


                {!! Form::submit('حفظ', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
          </div>

          <div class="panel-footer">
            <div class="input-group">

            </div>
          </div>
        </div>

    @endsection
