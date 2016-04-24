@extends('admin.layouts.app')

@section('title')
  الصفحات
@endsection


@section('section.content')
@if ($sliders->count())
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>الإسم</th>
                        <th>الصورة</th>
                        <th>الترتيب</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sliders as $row)
                        <tr>
                            <td>
                                {!! $row->id !!}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>@if($row->photo != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->photo }}">@endif</td>
                            <td>{{ $row->order }}</td>
                            <td>
                              <a class="btn btn-default" href = '/cp/sliders/{{$row->id}}/edit'><i class = 'ion ion-edit'></i></a>
                              <a class="btn btn-default" href = "/cp/sliders/{{$row->id}}/delete" ><i class = 'ion ion-trash-a'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@else
    NotFound
@endif
@endsection

