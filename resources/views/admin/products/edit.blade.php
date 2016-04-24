@extends('admin.layouts.app')

@section('title')
  المنتجات
@endsection

@section('section.content')

  {!! Form::model($products, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('cp.products.update', $products->id))) !!}

  <div class="form-group">
      {!! Form::label('name', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
      <div class="col-sm-10">
          {!! Form::text('name', null, array('class'=>'form-control')) !!}
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
          {!! Form::textarea('content', null, array('class'=>'form-control ckeditor')) !!}
          
      </div>
  </div>

  <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
      </div>
  </div>


@endsection
@section('js')
    <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript">
    tinymce.init({
      selector : "textarea",
      language: 'ar',
      directionality : 'rtl',
      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
    }); 
  </script>

@endsection
