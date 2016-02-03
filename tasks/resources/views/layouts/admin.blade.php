<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<head>
  <meta charset="utf-8" />
  <title>Administrācijas panelis</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/animate.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/style.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/style-responsive.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/theme/default.css') }}" rel="stylesheet" id="theme" />
  <!-- ================== END BASE CSS STYLE ================== -->
  
  <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  <link href="{{ asset('assets/admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />  
  <!-- ================== END PAGE LEVEL STYLE ================== -->

  <script src="{{ asset('assets/admin/plugins/pace/pace.min.js') }}"></script>
</head>
</head>
<body>

	<!-- begin #header -->
<div id="header" class="header navbar navbar-inverse navbar-default-top">
  <!-- begin container-fluid -->
  <div class="container-fluid">
    <!-- begin mobile sidebar expand / collapse button -->
    <div class="navbar-header">
      <a href="{{ url('admin') }}" class="navbar-brand">Admin panelis</a>
      <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- end mobile sidebar expand / collapse button -->
    
    <!-- begin header navigation right -->
    <ul class="nav navbar-nav navbar-right">
      <li>
        <form class="navbar-form full-width hidden-xs">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter keyword" />
            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </li>
      <li class="dropdown">
        <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
          <i class="fa fa-bell-o"></i>
          <span class="label">0</span>
        </a>
        <ul class="dropdown-menu media-list pull-right animated fadeInDown">
          <li class="dropdown-header">Notifications (0)</li>
        </ul>
      </li>
      <li class="dropdown navbar-user">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
          <img src="http://www.gravatar.com/avatar/8e59f43bff3e38ff88ef7b454e443563?s=47&d=http%3A%2F%2Fwww.techrepublic.com%2Fbundles%2Ftechrepubliccore%2Fimages%2Ficons%2Fstandard%2Ficon-user-default.png" alt="" /> 
          <span class="hidden-xs">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu animated fadeInLeft">
          <li class="arrow"></li>
          <li><a href="{{ url('profile') }}/{{ Auth::user()->id }}/edit">Edit Profile</a></li>
          <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
          <li><a href="javascript:;">Calendar</a></li>
          <li><a href="javascript:;">Setting</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('logout') }}">Log Out</a></li>
        </ul>
      </li>
    </ul>
    <!-- end header navigation right -->
  </div>
  <!-- end container-fluid -->
</div>
<!-- end #header -->

<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
      <li class="nav-profile">
        <div class="image">
          <a href="javascript:;"></a>
        </div>
        <div class="info">
          {{ Auth::user()->name }} {{ Auth::user()->lastname }}
          <small>Front end developer</small>
        </div>
      </li>
    </ul>
    <!-- end sidebar user -->
    <!-- begin sidebar nav -->
    <ul class="nav">
      <li class="nav-header">Navigation</li>
      <li>
        <a href="{{ url('/') }}"><i class="ion-home"></i> <span>Mājas lapa</span></a>
        <a href="{{ url('admin') }}"><i class="fa fa-laptop"></i> <span>Dashboard</span></a>
      </li>

      <li class="has-sub">
        <a href="javascript:;">
          <i class="fa fa-suitcase"></i> 
          <b class="caret pull-right"></b>
          <span>Uzdevumi</span> 
        </a>
        <ul class="sub-menu">
          <li><a href="{{ url('admin/tasks') }}">Uzdevumu saraksts</a></li>
          <li><a href="{{ url('admin/tasks') }}">Labot uzdevumus</a></li>
          <li><a href="{{ url('admin/tasks') }}">Dzēst uzdevumus</a></li>
          <li><a href="{{ url('admin/tasks/create') }}">Pievienot uzdevumu</a></li>
        </ul>
      </li>
      
      <!-- begin sidebar minify button -->
      <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
      <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
  </div>
  <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

@yield('content')

<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('assets/admin/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="{{ asset('assets/admin/crossbrowserjs/html5shiv.js') }}"></script>
		<script src="{{ asset('assets/admin/crossbrowserjs/respond.min.js') }}"></script>
		<script src="{{ asset('assets/admin/crossbrowserjs/excanvas.min.js') }}"></script>
	<![endif]-->
	<script src="{{ asset('assets/admin/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('assets/admin/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/flot/jquery.flot.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/flot/jquery.flot.time.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/flot/jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/flot/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/sparkline/jquery.sparkline.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('assets/admin/js/dashboard.min.js') }}"></script>
	<script src="{{ asset('assets/admin/js/apps.min.js') }}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
		});
	</script>

	<script>
	var handleDashboardGritterNotification = false;
	$.getScript('assets/plugins/gritter/js/jquery.gritter.js').done(function() {
	  handleDashboardGritterNotification();
	});
	</script>
</body>
</html>