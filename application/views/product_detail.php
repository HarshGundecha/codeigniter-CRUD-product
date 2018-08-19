<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Data Tables</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url();?>/resource/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>/resource/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="<?=base_url();?>/resource/bower_components/Ionicons/css/ionicons.min.css"> -->
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url();?>/resource/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>/resource/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?=base_url();?>/resource/dist/css/skins/_all-skins.min.css">

	<link rel="stylesheet" href="<?=base_url('resource/')?>dt-buttons/css/colReorder.dataTables.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style media="screen">
		.my-dt-icon{
			font-size:1.3em;
			font-weight:300;
		}
	</style>

	<!-- Google Font -->
	<link rel="stylesheet"
				href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="sidebar-mini skin-black-light">
<div class="wrapper">

	<?php
		include_once('header.php');
	?>
	<!-- Left side column. contains the logo and sidebar -->
	<?php
		include_once('left_sidebar.php');
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<div class="box" style="box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
						<div class="box-header">
							<h3 class="box-title"><?=$product[0]->PName;?> Details</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table class="table table-bordered table-striped">
								<tbody>
									<?php
									echo "<tr><th>Name</th><td>{$product[0]->PName}</td></tr>";
									echo "<tr><th>Price</th><td>{$product[0]->Price}</td></tr>";
									echo "<tr><th>Description</th><td>{$product[0]->Description}</td></tr>";
									echo "<tr><th>Category</th><td>{$product[0]->CName}</td></tr>";
									?>
								</tbody>
							</table><br/>
							<div class="col-xs-12">
								<div id="disqus_thread"></div>
								<script>

								/**
								*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
								*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

								var disqus_config = function () {
									this.page.url = '<?=base_url('/Product/get_product/'.$product[0]->ProductSlug);?>';  // Replace PAGE_URL with your page's canonical URL variable
									this.page.identifier = '<?=$product[0]->ProductSlug;?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
								};

								(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://codeigniter-crud-product.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
								})();
								</script>
								<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php
		include_once('footer.php');
	?>
	<!-- Control Sidebar -->
	<?php
		include_once('right_sidebar.php');
	?>

	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
			 immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>








<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>/resource/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>/resource/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url();?>/resource/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>/resource/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url();?>/resource/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>/resource/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>/resource/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>/resource/dist/js/demo.js"></script>
<!-- page script -->















<script type="text/javascript">

</script>
</body>
</html>
