@extends('admin.layouts.app')

@section('title')
  الرسائل
@endsection

@section('css')
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('section.content')

        <table class="table table-striped table-hover table-responsive datatable" id="msg-table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>الإيميل</th>
                  <th>الطلافون</th>
                  <th></th>
              </tr>
          </thead>
        </table>

@endsection

@section('js')

  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript">
    $(function() {
    $('#msg-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('/cp/msg/data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'control', name: '' }
        ],
            "language": {
            "url": "{{ Request::root() }}/Arabic.json"
          },
            "stateSave": true,
            "responsive": true,

            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }
        });
    });

    table.columns().eq(0).each(function(colIdx) {
        $('input', table.column(colIdx).header()).on('keyup change', function() {
            table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
        });
    });



    table.columns().eq(0).each(function(colIdx) {
        $('select', table.column(colIdx).header()).on('change', function() {
            table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
        });

        $('select', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });



  </script>
@endsection
