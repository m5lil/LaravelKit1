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

{!! Form::open(array('action' => 'MenuController@store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

            <div class="form-group">
                {!! Form::label('title', 'title*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
                  <p class="help-block">title of product</p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('url', 'url*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::text('url', old('url'), array('class'=>'form-control')) !!}
                  <p class="help-block">name of product</p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('order', 'order*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::text('order', old('order'), array('class'=>'form-control')) !!}
                  <p class="help-block"> order</p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('parent_id', 'parent_id*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::select('parent_id', $menus , 0, array('class'=>'form-control')) !!}
                  <p class="help-block"> parent_id</p>
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




