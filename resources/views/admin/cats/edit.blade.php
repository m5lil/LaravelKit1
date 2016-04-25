@extends('admin.layouts.app')

@section('title')
  الإقسام
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')

{!! Form::model($cat, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('cp.cat.update', $cat->id))) !!}

<div class="form-group">
    {!! Form::label('name', 'الإسم*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name',$cat->name), array('class'=>'form-control')) !!}
    </div>
</div>



@endsection
