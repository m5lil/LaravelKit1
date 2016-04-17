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



{!! Form::model($post, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('cp.posts.update', $post->id))) !!}


<div class="form-group">
    {!! Form::label('title', 'title*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title', old('title',$post->title), array('class'=>'form-control')) !!}
        <p class="help-block">title of product</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'body*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body', old('body',$post->body), array('class'=>'form-control')) !!}
        <p class="help-block">body of product</p>
    </div>
</div>
  
                @if($post->active == '1')
                  {!! Form::submit('تعديل', array('name' => 'publish','class' => 'btn btn-primary')) !!}
                  {!! Form::submit('حفظ وتعطيل', array('name' => 'save','class' => 'btn btn-primary')) !!}

                @else
                  {!! Form::submit('نشر', array('name' => 'publish','class' => 'btn btn-primary')) !!}
                  {!! Form::submit('حفظ', array('name' => 'save','class' => 'btn btn-primary')) !!}
                @endif
                  <a href="{{  url('cp/posts/'.$post->id.'/delete') }}" class="btn btn-danger">Delete</a>

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
      language: 'ar',
      directionality : 'rtl',
      plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
      toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
    }); 
  </script>

    @stop
