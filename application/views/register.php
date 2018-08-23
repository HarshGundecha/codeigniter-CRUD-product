<?php
  $bu=base_url('/resource');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=$bu?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$bu?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$bu?>/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?=$bu?>/index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?=site_url('Register/register/')?>" method="post">
      <div class="form-group has-feedback">
        <input name="iName" type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="iPhone" id="iPhone" type="number" class="form-control" placeholder="Phone">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
    <!-- <div class="form-group has-feedback">
      <input type="button" id="btn-send-otp" class="btn btn-info btn-sm btn-block btn-flat" value="Send OTP">
    </div>
    <div class="form-group has-feedback">
      <input name="iOTP" type="text" class="form-control" placeholder="OTP">
      <span class="glyphicon glyphicon-phone form-control-feedback"></span>
    </div> -->
      <div class="form-group has-feedback">
        <input name="iEmail" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="iPassword1" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="iPassword2" type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea id="aAddress" name="iAddress" class="form-control" placeholder="Complete Address" rows="2">Somwhere in Globe</textarea>
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="btn-auto-address" class="btn btn-warning btn-flat btn-block btn-sm" name="btn-auto-address" type="button" value="Auto Generate Address">
      </div>
      <?php
        if(validation_errors()!="")
        {
      ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i>Invalid Input!</h4>
            <?=validation_errors();?>
        </div>
      <?php
        }
      ?>
      <div class="row">
        <div class="col-xs-6">
          <a href="<?=site_url('/Login/')?>" class="btn btn-primary btn-block btn-flat">Login</a>
        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-success btn-block btn-flat">Register</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?=$bu?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=$bu?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">

  $(function(){
  	$('#btn-auto-address').on('click',function(){
			getLocation();
		});

		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			}
			else{
				alert("Geolocation is not supported by this browser.");
			}
		}
		function showPosition(position) {
			$.ajax({
				url:"<?=base_url('resource/services/g_reverse_geocode/api_call.php');?>",
				data:{'lat':position.coords.latitude,'long':position.coords.longitude},
				success:function(result){
					var Jresult = JSON.parse(result);
					if(Jresult.error==false)
					{
						$('#aAddress').val(Jresult.data.Address);
					}
				}
			});
		}
    // $('#btn-send-otp').on('click',function(){
    //   $.ajax({
    //     url:"<?php //echo base_url('/Register/send_otp')?>",
    //     type:'POST',
    //     data:{'iPhone':$('#iPhone').val()},
    //     success:function(res){
    //     }
    //   });
    // });
  });
</script>
</body>
</html>
