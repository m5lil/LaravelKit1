@extends('admin.layouts.app')

@section('title')
  الصفحات
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')
{!! Form::open(array('action' => 'PageController@store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('name', 'إسم الصفحة*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, array('class'=>'form-control')) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('content', 'المحتوى', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('content', null, array('class'=>'form-control ckeditor')) !!}
        
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
