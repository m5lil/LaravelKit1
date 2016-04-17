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
			<li><a href="{{url('/cp/page')}}"><i class = 'icon ion-arrow-left-b'></i> الصفحات</a></li>
			<li><a href="{{url('/cp/menu')}}"><i class = 'icon ion-arrow-left-b'></i> القوائم</a></li>
			<li><a href="{{url('/cp/settings')}}"><i class = 'icon ion-arrow-left-b'></i> تذاكر الدعم</a></li>
			<li><a href="{{url('/cp/settings')}}"><i class = 'icon ion-arrow-left-b'></i> الرسائل</a></li>
			<li><a href="{{url('/cp/settings')}}"><i class = 'icon ion-arrow-left-b'></i> الخدمات</a></li>
			<li><a href="{{url('/cp/settings')}}"><i class = 'icon ion-arrow-left-b'></i> إتصل بنا</a></li>
			<li><a href="{{url('/cp/settings')}}"><i class = 'icon ion-chatbubbles'></i> التعليقات</a></li>
      			<li role="presentation" class="divider"></li>
			<li><a href="{{url('/cp/users')}}"><i class = 'icon ion-person'></i> الأعضاء</a></li>
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

         @if (Session::has('message'))
	      <div class="flash alert-info">
	        <p class="panel-body">
	          {{ Session::get('message') }}
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


        @yield('section.content')
		



			</div><!--/.col-->

  	</div><!--/.row-->

	</div>	<!--/.main-->
  <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
  @yield('js')

</body>

</html>
