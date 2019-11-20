<!DOCTYPE html>
<html>
<head>
  <title>Kumar Bio-seeds | Forgot Password</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('public/assets/images/favicon.png') ?>"/>
  <link href="<?= base_url() ?>public/assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="<?= base_url(); ?>public/assets/js/jquery2.0.3.min.js"></script>
  <script src="<?= base_url(); ?>public/assets/js/bootstrap.min.js"></script>
 
  <link href="<?= base_url() ?>public/assets/css/font-awesome.css" rel="stylesheet"> 
  <style type="text/css">
   .form-gap {
      padding-top: 70px;
    }
    .panel{
      background-color: transparent;
    }
    .text-center {
      text-align: center;
      color: white;
  }
  .se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    /*opacity: 0.7;*/
    background: url(<?= base_url('public/assets/images/loading.gif');?>) center no-repeat #fff;
  }
  .row{
    position: absolute;
    left: -300px;
    width: 82%;
  }
</style>
</head>
<body style="background-image: url(<?= base_url('public/assets/images/login.jpg') ?>);">
<div class="se-pre-con"></div>
<div class="form-gap"></div>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <?php if(!empty($this->session->flashdata('errors'))){?>
                    <div class="alert alert-danger alert-dismissible fade in" style="margin:-95px 59px 0px 27px;position: absolute;" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Required!</strong> <?= $this->session->flashdata('errors');?>
                    </div>
                  <?php }?>
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="<?= base_url('resetpassword'); ?>">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Enter Your Email Address" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group">                       
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Send</button>
                      </div>
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $(".se-pre-con").delay(1000).fadeOut();
    });
</script>
</body>
</html>




