@extends('admin.layouts.app')

@section('title')
  المشاريع
@endsection

@section('section.content')

@if ($products->count())
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>الإسم</th>
                        <th>الصورة</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $row)
                        <tr>
                            <td>
                                {!! $row->id !!}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>
                            @if($row->photo != '')
                                <img src="{{ asset('uploads/thumb') . '/'.  $row->photo }}">
                            @endif
                            </td>
                            <td>
                              <a class="btn btn-default" href = '/cp/products/{{$row->id}}/edit'><i class = 'ion ion-edit'></i></a>
                              <a class="btn btn-default" href = "/cp/products/{{$row->id}}/delete" ><i class = 'ion ion-trash-a'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
