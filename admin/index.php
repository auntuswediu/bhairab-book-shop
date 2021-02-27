<?php
  session_start();
  include '../config.php';
  if ( empty($_SESSION['email']) && $_SESSION['role'] != 'admin' ) {
    header("Location: login");
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../public/backend/images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../public/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/backend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../public/backend/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../public/backend/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../public/backend/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../public/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" id="bottom-bar">
<div class="wrapper">


  <!-- Left side column. contains the logo and sidebar -->
<?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $totalrows = mysqli_num_rows(mysqli_query($con,"SELECT * FROM users")); ?></h3>
              <p>Register Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalrows = mysqli_num_rows(mysqli_query($con,"SELECT * FROM products")); ?></h3>
              <p>Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-product-hunt"></i>
            </div>
            <a href="products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php $row = mysqli_fetch_array(mysqli_query($con,"SELECT sum(trx_amount) as total_amount FROM payment")); echo $row['total_amount']; ?></h3>
              <p>Total Sale Amount</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php $row = mysqli_fetch_array(mysqli_query($con,"SELECT sum(qty) as total_qty FROM order_products")); echo $row['total_qty'] ?></h3>
              <p> Total Sale Product</p>
            </div>
            <div class="icon">
              <i class="fa fa-product-hunt"></i>
            </div>
            <a href="order-products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Top sale product</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Top 10 Sale" class="badge bg-yellow">12</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Sale QTY</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $sql = "SELECT product_id, sum(qty) as t_qty FROM  order_products group by product_id order by sum(qty) desc limit 12";
                      $sl = 1;
                      $query = mysqli_query($con,$sql);
                      while ($row_order = mysqli_fetch_array($query)) {
                      ?>
                      <tr>
                        <th><?php echo $sl; ?></th>
                        <td><a href="/rafia/product-details?product_id=<?php echo $row_order['product_id']; ?>"><?php echo $row_order['product_id']; ?></a></td>
                        <td><a href="/rafia/product-details?product_id=<?php echo $row_order['product_id']; ?>"><span class="label label-success"><?php $row_product = mysqli_fetch_array(mysqli_query($con,"SELECT product_name FROM products where id='".$row_order['product_id']."'")); echo $row_product['product_name']; ?></span></a></td>

                        <td><?php echo $row_order['t_qty']; ?></td>
                      </tr>
                      <?php 
                      $sl++;
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- USERS LIST -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Members</h3>

              <div class="box-tools pull-right">
                <span class="label label-danger">8 New Members</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                <?php 
                  $query_users = mysqli_query($con,"SELECT id,name,email,img,phone,created_at FROM  users where role = 'user' order by id desc limit 8");
                  while ($row_user = mysqli_fetch_array($query_users)) {
                ?>
                <li>
                  <img src="../public/backend/dist/img/avatar.png" class="fa fa-user" alt="User Image" title="<?php echo $row_user['name']; ?>">
                  <a class="users-list-name" href="#" title="<?php echo $row_user['name']; ?>"><?php echo $row_user['name']; ?></a>
                  <span class="users-list-date" title="<?php echo $row_user['phone']; ?>"><?php echo $row_user['phone']; ?></span>
                  <span class="users-list-date" title="<?php echo $row_user['created_at']; ?>"><?php echo date('Y-m-d', strtotime($row_user['created_at'])); ?></span>
                </li>
                <?php 
                  }
                ?>
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <!-- <a href="javascript:void(0)" class="uppercase">View All Users</a> -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!--/.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../public/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../public/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../public/backend/bower_components/raphael/raphael.min.js"></script>
<script src="../public/backend/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../public/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="../public/backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../public/backend/bower_components/moment/min/moment.min.js"></script>
<script src="../public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../public/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->

<!-- Slimscroll -->
<script src="../public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../public/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../public/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../public/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/backend/dist/js/demo.js"></script>
</body>
</html>
