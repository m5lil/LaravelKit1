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
        <form method = 'get' action = '{{url('/cp/page')}}'>
            <button class = 'btn btn-danger'>Page Index</button>
        </form>
        <br>
        <form method = 'POST' action = '{{url('/cp/page')}}'>
            <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

            <div class="form-group">
                <label for="p_name">p_name</label>
                <input id="p_name" name = "p_name" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="p_status">p_status</label>
                <input id="p_status" name = "p_status" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="p_slug">p_slug</label>
                <input id="p_slug" name = "p_slug" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="p_content">p_content</label>
                <textarea id="p_content" name = "p_content" class="form-control"></textarea>
            </div>


            <button class = 'btn btn-primary form-control' type ='submit'>Create</button>
        </form>
      </div>

      <div class="panel-footer">
        <div class="input-group">

        </div>
      </div>
    </div>

@endsection
