<?php
  session_start();
  include '../config.php';
  if ( !isset($_SESSION['email']) && $_SESSION['role'] != 'admin' ) {
    header("Location: login");
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../public/backend/images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Order List</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../public/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../public/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../public/backend/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/backend/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">Order List</h1>
            </div>
            <?php if (!empty($_SESSION['flash_success_message'])): ?>
            	<div class="alert alert-success" id="success-alert">
				  <button type="button" class="close" data-dismiss="alert">x</button>
				  <strong><?php echo $_SESSION['flash_success_message']; $_SESSION['flash_success_message']=''; ?></strong>
				</div>
            <?php endif ?>
            <?php if (!empty($_SESSION['flash_error_message'])): ?>
            	<div class="alert alert-danger" id="success-alert">
				  <button type="button" class="close" data-dismiss="alert">x</button>
				  <strong><?php echo $_SESSION['flash_error_message']; $_SESSION['flash_error_message']=''; ?></strong>
				</div>
            <?php endif ?>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
				<?php 
				echo '
				<table id="example1" class="table table-bordered table-striped">
				    <thead>
				    <tr>
				    <th>#</th>
				    <th>Order Info</th>
				    <th>Payment Info</th>
				    <th>Delivery Info</th>
				    <th>Order Product</th>
				    <th class="text-center">Action</th>
				    </tr>
				    </thead>
				    <tbody>
				';
				$sl = 1;
				$sql_invoice = "SELECT * from invoice order by id desc";
				$query_invoice = mysqli_query($con,$sql_invoice);
				if (mysqli_num_rows($query_invoice) > 0) {
					while($row_invoice = mysqli_fetch_array($query_invoice)) {
						echo '<tr><td>';
						echo $sl.'</td><td>';
						echo 'Invoice No. :'.$row_invoice['id'].'<br>Date : '.date('F d, Y', strtotime($row_invoice['created_at'])).'</td><td>';
						$row_payment = mysqli_fetch_array( mysqli_query($con,"SELECT * from payment where invoice_id = '".$row_invoice['id']."'"));
						echo $row_payment['trx_method'].'<br>';
						echo $row_payment['trx_phone'].'<br>';
						echo $row_payment['trx_id'].'<br>';
						echo '</td><td>';
						$query_delivery = mysqli_query($con,"SELECT * from delivery_info where invoice_id ='".$row_invoice['id']."'");
						if (mysqli_num_rows($query_delivery) > 0) {
							$row_delivery = mysqli_fetch_array($query_delivery);
							echo $row_delivery['name'].'<br>';
							echo $row_delivery['phone'].'<br>';
							echo $row_delivery['email'].'<br>';
							echo $row_delivery['address'].'<br>';
						}else{
							$query_billing_details = mysqli_query($con,"SELECT * from billing_details where user_id ='".$row_invoice['user_id']."'");
							$row_billing_details = mysqli_fetch_array($query_billing_details);
							echo $row_billing_details['name'].'<br>';
							echo $row_billing_details['phone'].'<br>';
							echo $row_billing_details['email'].'<br>';
							echo $row_billing_details['address'].'<br>';
						}
						echo '</td><td>
						<table class="table table-bordered table-striped">
						    <thead>
						    <tr>
						    <th>Product ID</th>
						    <th>Name</th>
						    <th>Qty</th>
						    </tr>
						    </thead>
						    <tbody>
						';
						$sql_order_products = "SELECT * from order_products where invoice_id='".$row_invoice['id']."'";
						$query_order_products = mysqli_query($con,$sql_order_products);
						if (mysqli_num_rows($query_order_products) > 0) {
						  while($row_order_product = mysqli_fetch_array($query_order_products)) {
						  	$query_product = mysqli_query($con,"SELECT * from products where id ='".$row_order_product['product_id']."'");
						  	$row_product = mysqli_fetch_array($query_product);
						    echo '
						    <tr>
						        <td>' .$row_order_product['product_id']. '</td><td>'
						        .$row_product['product_name']. '</td><td>'
						        .$row_order_product['qty']. '</td>
						    </tr>';
						  }
						}
						echo '</tbody></table></td><td class="text-center">';
					echo '<a class="btn btn-danger" href="approve_order?delete_invoice_id='.$row_invoice['id'].'" onclick="return confirm('."'Are you sure delete this record?'".')"><i class="fa fa-trash"></i></a> || ';
					if ($row_invoice['delivery_status']==0) {
						echo '<a href="approve_order?invoice_id='.$row_invoice['id'].'" class="btn btn-info"><i class="fa fa-check"></i></a>';
					}else{
						echo '<span class="btn btn-success">Delivered</span>';
					}
					echo '</td></tr>';

					$sl++;
					}
				}
				echo '</tbody></table>';
				?>
                </span>    
            </div>
            <!-- /.box-body -->
        </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../public/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../public/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../public/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../public/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/backend/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="../public/backend/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  $(function () {
    $('#example1').DataTable()
  })
  $(function () {
  	$("#success-alert").fadeOut(15000); 
  })
</script>
</body>
</html>
