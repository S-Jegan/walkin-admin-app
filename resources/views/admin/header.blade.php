<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Components Mix Bootstarp 3 Admin Dashboard Template">
    <meta name="author" content="Westilian">
    <title>WalkIn App Dashboard</title>
	
	 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/waves.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/layout.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/components.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/plugins.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/common-styles.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/pages.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/matmix-iconfont.css" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="page-container list-menu-view">
<!--Leftbar Start Here -->
<div class="left-aside desktop-view">
    <div class="aside-branding">
  <a href="#" class="iconic-logo"><img src="<?php echo url('resources/assets/admin/images') ?>/webapp_logo.png" alt="Matmix Logo">
        </a>
      <!-- <a href="#" class="large-logo"><img src="<?php echo url('resources/assets/admin/images') ?>/logo-large.png" alt="Matmix Logo">
        </a>-->
		
		<span class="aside-pin waves-effect"><i class="fa fa-thumb-tack"></i></span>
        <span class="aside-close waves-effect"><i class="fa fa-times"></i></span>
    </div>
    <div class="left-navigation">
        <ul class="list-accordion">
            <li><a href="{{ url('/dashboard') }}" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">Dashboard</span></a>
              
            </li>
			 <li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">WalkIns</span></a>
                <ul>
                    <li><a href="{{ URL::to('interview') }}">Add New Interview</a>
                    </li>
					<li><a href="{{ URL::to('interview/list') }}">Interview List</a>
                    </li>
					<li><a href="{{ URL::to('interview/list/today') }}">Today's WalkIn</a>
                    </li>
					<li><a href="{{ URL::to('interview/list/tomorrow') }}">Tomorrow's WalkIn</a>
                    </li>
					<li><a href="{{ URL::to('interview/list/inactive') }}">Inactive WalkIn's</a>
                    </li>
					<li><a href="{{ URL::to('interview/list/expired') }}">Expired WalkIn's</a>
                    </li>
					<li><a href="{{ URL::to('interview/list/archived') }}">Archived WalkIn's</a>
                    </li>
                </ul>
            </li>
			
			<li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-newspaper-o"></i></span><span class="nav-label">Industry</span></a>
                <ul>
                    <li><a href="{{ URL::to('add-industry') }}">Add New Industry</a></li>
					<li><a href="{{ URL::to('industry-list') }}">Industry List</a></li> 
				<!--	<li><a href="{{ URL::to('add-department') }}">Add New Department</a></li>
					<li><a href="{{ URL::to('department-list') }}">Department List</a></li> --> 					
                </ul>
            </li>
			
			<li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-location-arrow"></i></span><span class="nav-label">Job Category</span></a>
                <ul>
                    <li><a href="{{ URL::to('add-category') }}">Add New Category</a> </li>
					<li><a href="{{ URL::to('category-list') }}">Job Category List</a></li>                  
                </ul>
            </li>
			
			<li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-building"></i></span><span class="nav-label">Companies</span></a>
                <ul>
				<li><a href="{{ URL::to('add-company') }}">Add New Company</a></li>
				<li><a href="{{ URL::to('company-list') }}">Companies List</a></li>                  
                </ul>
            </li>
			
			<li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-windows"></i></span><span class="nav-label">Resumes</span></a>
                <ul>
				<li><a href="{{ URL::to('add-resume') }}">Add New Resume</a></li>
				<li><a href="{{ URL::to('resume-list') }}">Resumes List</a></li>                  
                </ul>
            </li>
            @if(\Auth::user()->user_type=="admin")
            <li><a href="#" class="waves-effect"><span class="nav-icon"><i class="fa fa-user-secret"></i></span><span class="nav-label">Users</span></a>
                <ul>
				    <li><a href="#">Manage Users</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div> 
<div class="page-content">
<!--Topbar Start Here -->
<header class="top-bar">
    <div class="container-fluid top-nav">
       <!-- <div class="search-form search-bar">
            <form>
                <input name="searchbox" value="" placeholder="Search Topic..." class="search-input">
            </form>
            <span class="search-close waves-effect"><i class="ico-cross"></i></span>
        </div>-->
        <div class="row">
            <div class="col-md-2">
                <div class="clearfix top-bar-action">
                    <span class="leftbar-action-mobile waves-effect"><i class="fa fa-bars "></i></span>
                    <span class="leftbar-action desktop waves-effect"><i class="fa fa-bars "></i></span>
						<!--<span class="waves-effect search-btn mobile-search-btn">
						<i class="fa fa-search"></i>
						</span>-->
                  
                </div>
            </div>
            <div class="col-md-4 responsive-fix top-mid">
              
                <div class="pull-left mobile-search">
						<span class=" waves-effect search-btn">
						<i class="fa fa-search"></i>
						</span>
                </div>
            </div>
            <div class="col-md-6 responsive-fix">
                <div class="top-aside-right">
                    <div class="user-nav">
                        <ul>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#" class="clearfix dropdown-toggle waves-effect waves-block waves-classic">
                                    <span class="user-info">{{Auth::user()->name}} <cite>{{Auth::user()->email}}</cite></span>
                                    <span class="user-thumb"><img src="<?php echo url('resources/assets/admin/images') ?>/avatar/jaman.jpg" alt="image"></span>
                                </a>
                                <ul role="menu" class="dropdown-menu fadeInUp">
                                   
                                    <li><a href="{{ url('/admin-profile') }}"><span class="user-nav-icon"><i class="fa fa-user"></i></span><span class="user-nav-label">View Profile</span></a>
                                    </li>
                                    <li><a href="{{ url('/change-password') }}"><span class="user-nav-icon"><i class="fa fa-cogs"></i></span><span class="user-nav-label">Change Password</span></a>
                                    </li>
                                    <li><a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
									  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</header>