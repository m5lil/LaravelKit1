@extends('admin.layouts.app')

@section('title')
  الرئيسية
@endsection

@section('section.content')


<div class="row">
  <div class="col md-6">
    
  </div>
  <div class="col-md-6">
    <ul class="list-group">
      <li class="list-group-item">
        <span class="badge">{{ phpversion() }}</span>
        إصدار الـ PHP
      </li>
      <li class="list-group-item">
        <span class="badge"> 1.0 </span>
        إصدار الـنظام
      </li>
      <li class="list-group-item">
        <span class="badge"> {{ $_SERVER['SERVER_SOFTWARE'] }} </span>
        نوع السيرفر
      </li>
      <li class="list-group-item">
        <span class="badge"> {{ App\Posts::count() }} </span>
        عدد المقالات
      </li>
      <li class="list-group-item">
        <span class="badge"> {{ App\Page::count() }} </span>
        عدد الصفحات
      </li>
      <li class="list-group-item">
        <span class="badge"> {{ App\Msg::count() }} </span>
        عدد الرسائل
      </li>
      <li class="list-group-item">
        <span class="badge"> {{ App\Profile::count() }} </span>
        عدد الطلاب
      </li>
      <li class="list-group-item">
        <span class="badge"> {{ App\Course::count() }} </span>
        عدد الكورسات
      </li>
    </ul>
  </div>
</div>

@endsection
