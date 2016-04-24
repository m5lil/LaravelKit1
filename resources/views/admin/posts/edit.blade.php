@extends('admin.layouts.app')

@section('title')
  المقالات
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')

{!! Form::model($post, array('files' => true,'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('cp.posts.update', $post->id))) !!}



            <div class="form-group">
                {!! Form::label('title', 'عنوان الصفحة*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('cat_id', 'القسم*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::select('cat_id', \App\CAT::lists('name','id'), null, array('class'=>'form-control')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('body', 'محنوى الصقحة*', array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                  {!! Form::textarea('body', old('body'), array('class'=>'form-control')) !!}
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
