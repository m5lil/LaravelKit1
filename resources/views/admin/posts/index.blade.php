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

@if ($posts->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">123</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post )
                        <tr>
                            <td><a href="{{ url('/posts/'.$post->slug) }}">{{ $post->title }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{!! str_limit(e($post->body), $limit = 15, $end = '... <a href='.url("/posts/".$post->slug).'>Read More</a>') !!}</td>
                            <td>
                                {{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}
                            </td>
                            <td>
                                <a href = '/cp/posts/{{$post->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '/cp/posts/{{$post->id}}'><i class = 'material-icons'>info</i></a>
                                <a href = "/cp/posts/{{$post->id}}/delete" ><i class = 'material-icons'>delete</i></a>
                            </td>

                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        delete ckeck
                    </button>
                </div>
            </div>
            {!! $posts->render() !!}
        </div>
	</div>
@else
    NotFound
@endif



      </div>

      <div class="panel-footer">
        <div class="input-group">

        </div>
      </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
