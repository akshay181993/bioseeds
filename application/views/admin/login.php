<!DOCTYPE html>
<head>
<title>Kumar Bio-seeds | Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="shortcut icon" type="image/png" href="<?= base_url('public/assets/images/favicon.png') ?>"/>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?= base_url() ?>public/assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?= base_url() ?>public/assets/css/font.css" type="text/css"/>
<link href="<?= base_url() ?>public/assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>
<body class="signup-body">
	<div class="se-pre-con"></div>
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<img src="<?= base_url(); ?>public/assets/images/KBlogo.jpg" alt="" height="63" width="180"/>
					<h3 style="color: #fff;margin-top: 10px;">Login</h3>
				</div>
				<?php if(!empty($this->session->flashdata('invalid'))){?>
					<div class="alert alert-danger alert-dismissible fade in" style="margin: -190px 0px 0px 66px;position: absolute;width: 20%;" role="alert">
			    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    		<strong>Invalid!</strong> <?= $this->session->flashdata('invalid');?>
	  				</div>
				<?php }
				?>
				<?php if(!empty($this->session->flashdata('errors'))){?>
					<div class="alert alert-danger alert-dismissible fade in" style="margin: -210px 0px 0px 66px;position: absolute;width: 20%;" role="alert">
			    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    		<strong>Required!</strong> <?= $this->session->flashdata('errors');?>
	  				</div>
				<?php }?>
				<?php if(!empty($this->session->flashdata('success'))){?>
					<div class="alert alert-success alert-dismissible fade in" style="margin: -142px 0px 0px 66px;position: absolute;width: 20%;" role="alert">
			    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    		<strong>Success !</strong> <?= $this->session->flashdata('success');?>
	  				</div>
				<?php }?>
				<?php echo form_open('chklogin'); ?>
					<input type="text" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" style="margin-bottom: 10px;" class="text-white"> 
					<span class="text-white m-t-5"><?= form_error('email');?></span>
					<input type="password" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>" class="text-white" style="margin-bottom: 10px;">
					<span class="text-white m-t-5"><?= form_error('password');?></span>
					<!-- <select class="select-lang" name="language" id="language">
						<option class="select-opt" value="">Choose Language</option>
						<option class="select-opt" value="English">English</option>
						<option class="select-opt" value="Hindi">Hindi</option>
					</select> -->
					<button class="register" type="submit">Login</a></button>
				<?php echo form_close(); ?>

				<div class="signin-text">
					<div class="text-left">
						<p><a href="<?= base_url('forgot_password'); ?>"> Forgot Password ? </a></p>
					</div>
					<div class="clearfix"> </div>
				</div>				
			</div>
			
			<!-- footer -->
			<div class="copyright">
				<p>© <?= date('Y'); ?> KumarSeeds . All Rights Reserved.</p>
			</div>
			<!-- //footer -->
			
		</div>
	<script src="<?= base_url(); ?>public/assets/js/jquery2.0.3.min.js"></script>
	<script src="<?= base_url(); ?>public/assets/js/bootstrap.js"></script>
		
	<script type="text/javascript">
		$(document).ready(function(){
			$(".se-pre-con").delay(1000).fadeOut();
		});
	</script>
</body>
</html>
