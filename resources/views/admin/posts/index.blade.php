@extends('admin.layouts.app')

@section('title')
  المقالات
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')

@if ($posts->count())
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>الاسم</th>
                        <th>المحتوى</th>
                        <th>القسم</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post )
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{!! str_limit(e($post->body), $limit = 15, $end = '... <a href='.url("/posts/".$post->slug).'>Read More</a>') !!}</td>
                            <td>
                            @if ( array_key_exists($post->cat_id, $cats) )
                                {{ $cats[$post->cat_id] }}
                            @endif
                            </td>
                            <td>
                              <a class="btn btn-default" href = '/cp/posts/{{$post->id}}/edit'><i class = 'ion ion-edit'></i></a>
                              <a class="btn btn-default" href = "/cp/posts/{{$post->id}}/delete" ><i class = 'ion ion-trash-a'></i></a>
                            </td>

                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {!! $posts->render() !!}
@else
    NotFound
@endif



@endsection
