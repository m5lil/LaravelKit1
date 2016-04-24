@extends('admin.layouts.app')

@section('title')
  الصفحات
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')
@if ($page->count())
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>Name</th>
                        <th>content</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($page as $row)
                        <tr>
                            <td>
                                {{$row->id}}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ str_limit(e($row->content), 150, '...') }}</td>
                            <td>
                              <a class="btn btn-default" href = '/cp/page/{{$row->id}}/edit'><i class = 'ion ion-edit'></i></a>
                              <a class="btn btn-default" href = "/cp/page/{{$row->id}}/delete" ><i class = 'ion ion-trash-a'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@else
    NotFound
@endif


@endsection

