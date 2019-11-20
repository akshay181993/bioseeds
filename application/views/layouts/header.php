<!DOCTYPE html>
<head>
<title><?= isset($title) ? "Kumar Bioseeds |&nbsp" .$title : "Kumar Bioseeds"; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="shortcut icon" type="image/png" href="<?= base_url('public/assets/images/favicon.png') ?>"/>
<link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

<link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/select2.min.css">
<link href="<?= base_url(); ?>public/assets/css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/font.css" type="text/css"/>
<link href="<?= base_url(); ?>public/assets/css/font-awesome.css" rel="stylesheet">
<!-- calendar -->
<link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/monthly.css">
	<!-- //calendar -->
<script src="<?= base_url(); ?>public/assets/js/jquery2.0.3.min.js"></script>
<script src="<?= base_url(); ?>public/assets/js/modernizr.js"></script>
<script src="<?= base_url(); ?>public/assets/js/jquery.cookie.js"></script>
<script src="<?= base_url(); ?>public/assets/js/screenfull.js"></script>

		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<!-- charts -->
<script src="<?= base_url(); ?>public/assets/js/raphael-min.js"></script>
<script src="<?= base_url(); ?>public/assets/js/morris.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/morris.css">
<!-- //charts -->
<!--skycons-icons-->
<script src="<?= base_url(); ?>public/assets/js/skycons.js"></script>
<!--//skycons-icons-->
</head>

<body class="dashboard-page">
	<input type="hidden" name="url" id="base_url" value="<?= base_url(); ?>">
	<div class="se-pre-con"></div>
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
	<nav class="main-menu">
		<ul>
			<li>
				<a href="<?= base_url();?>dashboard">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">
						Dashboard
					</span>
				</a>
			</li>
			<li class="has-subnav">
				<a href="<?= base_url();?>categories">
				<i class="fa fa-th" aria-hidden="true" style="margin: 15px 21px 0 21px;"></i>
				<span class="nav-text">
					Categories
				</span>
			</a>
			</li>
			<li class="has-subnav">
				<a href="<?= base_url();?>product_details">
				<i class="fa fa-list-ul" aria-hidden="true"></i>
				<span class="nav-text">
					Crop Details
				</span>
			</a>
			</li>
			<li class="has-subnav">
				<a href="<?= base_url();?>product_varieties">
				<i class="fa fa-list-ol" aria-hidden="true" style="margin: 15px 21px 0 21px;"></i>
				<span class="nav-text">
					Crop Varieties
				</span>
			</a>
			</li>
			<li class="has-subnav">
				<a href="<?= base_url();?>success_stories">
				<i class="fa fa-check-square-o nav_icon"></i>
				<span class="nav-text">
					Succes Stories
				</span>
				</a>
			</li>
			<li class="has-subnav">
				<a href="<?= base_url();?>all_news_list">
					<i class="fa fa-file-text-o nav_icon"></i>
					<span class="nav-text">
						Whats New
					</span>
				</a>	
			</li>
			<li class="has-subnav">
				<a href="<?= base_url();?>all_users">
					<i class="fa fa-users" style="margin: 15px 21px 0 21px;"></i>
					<span class="nav-text">
						All Users
					</span>
				</a>	
			</li>
			<li>
				<a href="<?= base_url('tech_support') ?>">
					<i class="fa fa-weixin" style="margin: 15px 21px 0 21px;"></i>
					<span class="nav-text">
						Tech Support
					</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('enquiry_list') ?>">
					<i class="fa fa-phone" style="margin: 15px 21px 0 21px;"></i>
					<span class="nav-text">
						All Enquiries
					</span>
				</a>
			</li>
		</ul>
		<ul class="logout">
			<li>
			<a href="<?= base_url();?>logout">
				<i class="icon-off nav-icon"></i>
				<span class="nav-text">
					Logout
				</span>
			</a>
			</li>
		</ul>
	</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><a href="<?= base_url();?>dashboard"><img src="<?= base_url(); ?>public/assets/images/KBlogo.jpg" alt="" height="63" width="180"/></a></h1>
			</div>
			<div class="full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
				</section>
			</div>
			<!-- <div class="w3l_search">
				<form action="#" method="post">
					<input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
					<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div> -->
			<div class="header-right">
				<div class="profile_details_left">
					<div class="header-right-left">
						<!--notifications of menu start -->
						<ul class="nofitications-dropdown">
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge">0</span></a>
								<ul class="dropdown-menu anti-dropdown-menu w3l-msg">
									<li>
										<div class="notification_header">
											<h3>You have 0 new messages</h3>
										</div>
									</li>
									<!-- <li><a href="#">
									   <div class="user_img"><img src="public/assets/images/1.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet</p>
										<p><span>1 hour ago</span></p>
										</div>
									   <div class="clearfix"></div>	
									</a></li>
									<li class="odd"><a href="#">
										<div class="user_img"><img src="public/assets/images/2.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
										</div>
									  <div class="clearfix"></div>	
									</a></li>
									<li><a href="#">
									   <div class="user_img"><img src="public/assets/images/3.png" alt=""></div>
									   <div class="notification_desc">
										<p>Lorem ipsum dolor amet </p>
										<p><span>1 hour ago</span></p>
										</div>
									   <div class="clearfix"></div>	
									</a></li> -->
									<li>
										<div class="notification_bottom">
											<a href="<?= base_url()?>enquiry_list">See all messages</a>
										</div> 
									</li>
								</ul>
							</li>
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue notify_count">0</span></a>
								<ul class="dropdown-menu anti-dropdown-menu agile-notification" id="notification_data">
									<li>
										<div class="notification_header">
											<h3>You have <span class="notify_count">0</span> new notifications</h3>
										</div>
									</li>
									<li>
										<div class="notification_bottom">
											<a href="javascript:void(0)" onclick="change_status('<?= base_url() ?>')">See all notifications</a>
										</div> 
									</li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>	
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
										<div class="clearfix"></div>	
									</div>	
								</a>
								<?php 
									$data = "";
									$data = $this->session->userdata('session_login');
								?>
								<ul class="dropdown-menu drp-mnu">
									<li> 
										<?= $data['name'];?>
									</li>
									<li> 
										<a href="<?= base_url();?>profile"><i class="fa fa-user"></i> Profile</a> 
									</li> 
									<li> 
										<a href="<?= base_url();?>change_password"><i class="fa fa-key"></i> Change Password</a> 
									</li> 
									<li> 
										<a href="<?= base_url();?>logout"><i class="fa fa-sign-out"></i> Logout</a> 
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>