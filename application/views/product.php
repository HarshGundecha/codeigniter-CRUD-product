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
				<div class="col-xs-12">
					<div class="box" style="box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
						<div class="box-header">
							<h3 class="box-title">Hover Data Table</h3>
							<span class="pull-right"> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-product"><i class="fa fa-plus"></i> Product</button>&nbsp;&nbsp;&nbsp;<button id ="delete-selected-product" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Selected</button> </span>
							<div class="modal fade" id="add-product">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Default Modal</h4>
										</div>
											<form role="form" method="POST" action="<?=base_url('/Product/add_product/')?>" id="form-add-product">
												<div class="modal-body">
													<div class="box box-primary" style="box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">

								            <div class="box-header with-border">
								              <h3 class="box-title">Quick Example</h3>
								            </div>
							              <div class="box-body">
							                <div class="row">
							                	<div class="col-md-5">
																	<div class="form-group">
									                  <label for="aName">Name</label>
									                  <input autofocus type="text" class="form-control" name="aName" id="aName" placeholder="Name">
									                </div>
							                	</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="aPrice">Price</label>
																		<input type="text" class="form-control" name="aPrice" id="aPrice" placeholder="Price">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label for="aCategory">Category</label>
																		<select class="form-control" name="aCategory">
																			<?php
																			foreach($cat_data as $cd)
																				echo "<option value=\"$cd->CategorySlug\">$cd->Name</option>";
																			?>
																		</select>
																	</div>
							                	</div>
																<div class="col-md-12">
																	<div class="form-group">
									                  <label for="aDescription">Description</label>
									                  <textarea class="form-control" name="aDescription" id="aDescription" placeholder="Description"></textarea>
									                </div>
																</div>
							                </div>
							              </div>
							          	</div>

													<div class="alert alert-danger alert-dismissible" id="add-failed-alert" style="display:none;box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						                <h4><i class="icon fa fa-ban"></i> Invalid Input :(</h4>
														<div>
															text here
														</div>
						              </div>


											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
												<button type="button" id="btn-add-product" class="btn btn-primary">Save changes</button>
											</div>
						        </form>
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="alert alert-success alert-dismissible" id="add-success-alert" style="display:none;box-shadow:0 5px 8px 0 rgba(0,0,0,0.1),0 3px 10px 0 rgba(0,0,0,0.09) !important;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success :)</h4>
								<div>
									text here
								</div>
              </div>
							<table id="product" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th><i class="fa fa-check"></i></th>
									<th>Name</th>
									<th>Price</th>
									<th>Category</th>
									<th>Action</th>
								</tr>
								</thead>

								<tfoot>
								<tr>
									<th><i class="fa fa-check"></i></th>
									<th>Name</th>
									<th>Price</th>
									<th>Category</th>
									<th>Action</th>
								</tr>
								</tfoot>
							</table>
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



<div class="modal fade" id="modal-view">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Default Modal</h4>
			</div>
			<div class="modal-body">
				<p>One fine body&hellip;</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Default Modal</h4>
			</div>
			<div class="modal-body">
				<p>One fine body&hellip;</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
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






<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.html5.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.print.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/buttons.colVis.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('resource/')?>dt-buttons/js/dataTables.colReorder.min.js">
</script>









<script type="text/javascript">
$(function(){
	var t=$('#product').DataTable({
		dom: '<"col-md-4"l><"col-md-4"B><"col-md-4"f>rt<"col-md-4"i><"col-md-8"p>',
		buttons: [
			{
				extend: "copyHtml5",
				text: "<i class=\'fa fa-copy\' title=\'Copy\' data-toggle=\'tooltip\' style=\'font-size:1.5em;color:#ef5350;\'></i>",
				init: function(api, node, config) {
				       $(node).removeClass('btn-primary')},
				className : 'btn btn-default',
				exportOptions: {
						columns: ":visible:not(.not-export-col)",
						stripHtml: true
			}},
			{
				extend: "pdfHtml5",
				text: "<i class=\'fa fa-file-pdf-o\' title=\'Download PDF\' data-toggle=\'tooltip\' style=\'font-size:1.5em;color:#4caf50;\'></i>",
				init: function(api, node, config) {
				       $(node).removeClass('btn-primary')},
				className : 'btn btn-default',
				exportOptions: {
						columns: ":visible:not(.not-export-col)",
						stripHtml: true
			}},
			{
				extend: "print",
				text: "<i class=\'fa fa-print\' title=\'Print\' data-toggle=\'tooltip\' style=\'font-size:1.5em;color:#9575cd;\'></i>",
				init: function(api, node, config) {
				       $(node).removeClass('btn-primary')},
				className : 'btn btn-default',
				exportOptions: {
						columns: ":visible:not(.not-export-col)",
						stripHtml: false
			}},
			{
				extend: "excelHtml5",
				text: "<i class=\'fa fa-file-excel-o\' title=\'Download Excel\' data-toggle=\'tooltip\' style=\'font-size:1.5em;color:#ffa726;\'></i>",
				init: function(api, node, config) {
				       $(node).removeClass('btn-primary')},
				className : 'btn btn-default',
				exportOptions: {
						columns: ":visible:not(.not-export-col)",
						stripHtml: false
			}},
			{
				extend: "csvHtml5",
				text: "<i class=\'fa fa-file-text-o\' title=\'Download CSV\' data-toggle=\'tooltip\' style=\'font-size:1.5em;color:#4db6ac\'></i>",
				init: function(api, node, config) {
				       $(node).removeClass('btn-primary')},
				className : 'btn btn-default',
				exportOptions: {
						columns: ":visible:not(.not-export-col)",
						stripHtml: false
			}},
			{
				extend: "colvis",
				text: "<i class=\'fa fa-eye\' title=\'Column Visibility\' data-toggle=\'tooltip\' style=\'font-size:1.5em;color:#a1887f;\'></i>",
				init: function(api, node, config) {
				       $(node).removeClass('btn-primary')},
				className : 'btn btn-default',
				exportOptions: {
						columns: ":visible:not(.not-export-col)",
						stripHtml: false
			}},
		],
		colReorder: true,
		columnDefs: [{
			searchable  : true,
			orderable   : true,
			targets     : 0,
			className   : "text-center",
			targets     : "_all",
		}],
		paging        : true,
		responsive  : true,
		lengthChange  : true,
		searching     : true,
		ordering      : true,
		info          : true,
		scrollY       : '52vh',
		scrollX       : true,
		scrollCollapse: true,
		autoWidth     : false,
		bProcessing   : true,
		sAjaxSource   : "<?=base_url('/Product/get_product/')?>",
		aoColumns     : [
			{ data	: null, render: function ( data, type, row ){
				return '<input type="checkbox" name="dProduct[]" value="'+data.ProductSlug+'">';
			}},
			{ mData : 'PName'},
			{ mData : 'Price'},
			{ mData : 'CName'},
			{ data  : null, render: function ( data, type, row ){
				return '<a href="<?=base_url('/Product/get_product/')?>'+data.ProductSlug+'" class="btn btn-success"><i class="fa fa-info-circle my-dt-icon"></i></a>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-update"><i class="fa fa-edit my-dt-icon"></i></button>&nbsp;&nbsp;&nbsp;<button id="'+data.ProductSlug+'" type="button" class="btn btn-danger delete"><i style="font-size:1.3em;font-weight:300" class="fa fa-trash"></i></button>&nbsp;&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?text=<?=base_url('/Product/get_product/')?>'+data.ProductSlug+'&phone=user_phone_number" class="btn btn-success"><i class="fa fa-whatsapp my-dt-icon"></i></a>';
			}},
		]
	});

	t.on('click', '.delete',function(e){
		if(confirm('Confirm delete ?'))
		{
			$.ajax({
				url:"<?=base_url('/Product/delete_product/')?>"+$(this).attr('id'),
				type:'POST',
				success:function(rs){
					$('#product').DataTable().ajax.reload(null, false);
				}
			});
		}
	});

	$('#delete-selected-product').on('click',function(){
		if(confirm('Confirm Multiple delete ?'))
		{
			$.ajax({
				url:"<?=base_url('/Product/delete_product/')?>",
				data:$('table input').serialize(),
				type:'POST',
				success:function(rs){
					$('#product').DataTable().ajax.reload(null, false);
				}
			});
		}
	});

	$('#btn-add-product').on('click',function(e){
		$.ajax({
			url:"<?=base_url('/Product/add_product/')?>",
			data:$('#form-add-product').serialize(),
			type:'POST',
			success:function(rs){
				let r=JSON.parse(rs);
				if(r.status){
					$("#add-product").modal("toggle");
					$('#add-success-alert div').html(r.response);
					$('#add-success-alert').show();
					$('#product').DataTable().ajax.reload(null, false);
				}
				else{
					$('#add-failed-alert div').html(r.response);
					$('#add-failed-alert').show();
				}
			}
		});

	});

	$("#add-product").on('hidden.bs.modal', function () {
		$('#add-failed-alert').hide();
		$('#form-add-product')[0].reset();
	});

});
</script>
</body>
</html>
