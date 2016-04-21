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

{!! Form::open(array('files' => true,'action' => 'PostController@store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

            <div class="form-group">
                {!! Form::label('title', 'title*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
                  <p class="help-block">title of product</p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('body', 'body*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::textarea('body', old('body'), array('class'=>'form-control')) !!}
                  <p class="help-block">name of product</p>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('photo', 'Photo*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::file('photo') !!}
                    {!! Form::hidden('photo_w', 4096) !!}
                    {!! Form::hidden('photo_h', 4096) !!}
                     
                </div>
            </div>

            {!! Form::submit('حفظ', array('name' => 'save','class' => 'btn btn-primary')) !!}
            {!! Form::submit('نشر', array('name' => 'publish','class' => 'btn btn-primary')) !!}
        
{!! Form::close() !!}
    </div>

<div class="panel-footer">
  <div class="input-group">

  </div>
</div>
</div>

@endsection

@section('js')
    <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript">
    tinymce.init({
      selector : "textarea",
      directionality : 'rtl',
      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
    }); 
  </script>

@stop




