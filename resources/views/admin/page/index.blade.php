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

        <form class = 'col s3' method = 'get' action = '{{url('/cp/page/create')}}'>
            <button class = 'btn btn-primary' type = 'submit'>Create New Page</button>
        </form>
        <br>

        <br>
        <table class="table table-bordered" id="pages-table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>الإسم</th>
                  <th>البريد الإلكترونى</th>
                  <th>الصلاحية</th>
                  <th>عمليات</th>
              </tr>
          </thead>
            <tbody>
                @foreach($pages as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->p_name}}</td>
                    <td>{{$value->p_status}}</td>
                    <td>{{$value->p_slug}}</td>
                    <td>
                            <a href = "/cp/page/{{$value->id}}/delete" ><i class = 'material-icons'>delete</i></a>
                            <a href = '/cp/page/{{$value->id}}/edit'><i class = 'material-icons'>edit</i></a>
                            <a href = '/cp/page/{{$value->id}}'><i class = 'material-icons'>info</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


      </div>

      <div class="panel-footer">
        <div class="input-group">

        </div>
      </div>
    </div>

@endsection

@section('script')
  <script> var baseURL = "{{URL::to('/')}}"</script>
  <script src = "{{ URL::asset('js/AjaxisBootstrap.js')}}"></script>
  <script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
@endsection
