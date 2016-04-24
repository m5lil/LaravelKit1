@extends('admin.layouts.app')

@section('title')
  الرسائل
@endsection

@section('section.content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">محتوى الرسالة</div>
    <div class="panel-body">
        <p>{{$msg->content}}</p>
    </div>
    <table class = 'table table-bordered'>
        <tbody>
            <tr>
                <td>
                    <b><i>الإسم: </i></b>
                </td>
                <td>{{$msg->name}}</td>
            </tr>
            <tr>
                <td>
                    <b><i>اإيميل : </i></b>
                </td>
                <td>{{$msg->email}}</td>
            </tr>
            <tr>
                <td>
                    <b><i>الموبايل : </i></b>
                </td>
                <td>{{$msg->phone}}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
