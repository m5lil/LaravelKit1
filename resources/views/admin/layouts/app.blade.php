<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Admin - @yield('title', 'Dashboard') </title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/bootstrap-rtl.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

  @yield('css')
  <!--Icons-->

  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->

</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>لوحة التحكم</span> - {{setting('sitename')}} </a>
				<ul class="user-menu pull-left">
					<li class="dropdown ">
            <a href="/"><i class="icon ion-eye"></i> الموقع</a>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon ion-eye"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{url('/profile')}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> البروفايل</a></li>
							<li><a href="{{url('/cp/settings')}}"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> الإعدادات</a></li>
							<li><a href="{{ url('/logout') }}"><i class="icon ion-power"></i> خروج</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav> 

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="{{url('/cp')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg><i class = 'icon ion-arrow-left-b'></i> لوحة التحكم</a></li>
      <br />
			<li><a href="{{url('/cp/settings')}}"><i class = 'icon ion-gear-a'></i> الإعدادات</a></li>
  				<li role="presentation" class="divider"></li>
			<li><a href="{{url('/cp/page')}}"><i class = 'icon ion-android-document'></i> الصفحات</a></li>
			<li><a href="{{url('/cp/menu')}}"><i class = 'icon ion-android-menu'></i> القوائم</a></li>
			<li><a href="{{url('/cp/msg')}}"><i class = 'icon ion-email'></i> الرسائل</a></li>
  				<li role="presentation" class="divider"></li>
			<li><a href="{{url('/cp/cat')}}"><i class = 'icon ion-filing'></i> الأقسام</a></li>
			<li><a href="{{url('/cp/posts')}}"><i class = 'icon ion-folder'></i> المقالات</a></li>
  				<li role="presentation" class="divider"></li>
			<li><a href="{{url('/cp/sliders')}}"><i class = 'icon ion-easel'></i> السلايدر</a></li>
			<li><a href="{{url('/cp/services')}}"><i class = 'icon ion-arrow-left-b'></i> الخدمات</a></li>
			<li><a href="{{url('/cp/products')}}"><i class = 'icon ion-bag'></i> المشاريع</a></li>
  				<li role="presentation" class="divider"></li>
			<li><a href="{{url('/cp/users')}}"><i class = 'icon ion-person-stalker'></i> الأعضاء</a></li>
			<li><a href="{{url('/cp/profiles')}}"><i class = 'icon ion-university'></i> المتدربين</a></li>
			<li><a href="{{url('/cp/courses')}}"><i class = 'icon ion-university'></i> الكورسات</a></li>
			{{-- <li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li> --}}
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li>لوحة التحكم الرئيسية</li>
				<li class="active"> @yield('title')</li>
			</ol>

		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">

        @if (Session('message'))
          <div class="flash alert-info">
            <p class="panel-body">
              {{ Session::get('message') }}
              {{Session::forget('message')}}
            </p>
          </div>
          @endif
	      
		  @if ($errors->any())
	      <div class='flash alert-danger'>
	        <ul class="panel-body">
	          @foreach ( $errors->all() as $error )
	          <li>
	            {{ $error }}
	          </li>
	          @endforeach
	        </ul>
	      </div>
	      @endif


<div class="panel panel-default ">
	<div class="panel-heading">
		<div class="pull-right">@yield('title')</div>
		
		<div class="pull-left">
			@if (str_contains(Request::path(),'create') || str_contains(Request::path(),'edit') )
			<a onclick="document.forms['form-with-validation'].submit(); return false;" class="btn btn-default" href="" role="button"><i class="ion ion-checkmark"></i></a>
			<a class="btn btn-default" href="{{ URL::previous() }}" role="button"><i class="ion ion-android-arrow-back"></i></a>
			@elseif (str_contains(Request::path(),'setting') || Request::path() == 'cp' )
			<a class="btn btn-default" href="{{ URL::previous() }}" role="button"><i class="ion ion-android-arrow-back"></i></a>
			@else
			<a class="btn btn-default" href="{!! url( Request::path() . '/create') !!}" role="button"><i class="ion ion-plus"></i></a>
			@endif

			@if (str_contains(Request::path(),'edit') )
			<a class="btn btn-default" href="{!! url( str_replace('edit','delete',Request::path())) !!}" role="button"><i class="ion ion-trash-a"></i></a>
			@endif

		</div>
	</div>
	<div class="panel-body">
		@yield('section.content')
		
	</div>
	<div class="panel-footer">
		@if (str_contains(Request::path(),'create') || str_contains(Request::path(),'edit') )
	{{--{!! Form::submit( 'حفظ' , array('class' => 'btn btn-primary btn-block')) !!}--}}	
		{!! Form::close() !!}
		@endif
		
	</div>
</div>

			</div><!--/.col-->

  	</div><!--/.row-->

	</div>	<!--/.main-->
  <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
  @yield('js')

</body>

</html>
