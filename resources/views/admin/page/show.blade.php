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

        <br>
        <form method = 'get' action = '{{url('/cp/page')}}'>
            <button class = 'btn btn-primary'>Page Index</button>
        </form>
        <br>
        <table class = 'table table-bordered'>
            <thead>
                <th>Key</th>
                <th>Value</th>
            </thead>
            <tbody>


                <tr>
                    <td>
                        <b><i>p_name : </i></b>
                    </td>
                    <td>{{$page->p_name}}</td>
                </tr>

                <tr>
                    <td>
                        <b><i>p_status : </i></b>
                    </td>
                    <td>{{$page->p_status}}</td>
                </tr>

                <tr>
                    <td>
                        <b><i>p_slug : </i></b>
                    </td>
                    <td>{{$page->p_slug}}</td>
                </tr>

                <tr>
                    <td>
                        <b><i>p_content : </i></b>
                    </td>
                    <td>{{$page->p_content}}</td>
                </tr>



            </tbody>
        </table>


      </div>

      <div class="panel-footer">
        <div class="input-group">

        </div>
      </div>
    </div>

@endsection
