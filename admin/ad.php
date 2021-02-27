<?php
  session_start();
  if ( $_SESSION['userType'] !='masteradmin'  ){
    header("Location: ../login.php");
  }
  include '../config.php';
  $userName = $_SESSION['userName'];
  $userType = $_SESSION['userType'];
  $sql = "select image,userName from $userType where userName = '$userName'" ;
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query);
  // $count = mysqli_num_rows($query);

  //for ad panel-1
  if (isset($_POST['upload-1'])) {
    $newfilename = 'ad1.jpg';
    $target = "../ad/".$newfilename;
    $size = $_FILES['ad-1']['size'];
    $type = $_FILES['ad-1']['type'];
    if( ($type == 'image/png') ||($type == 'image/jpg') ||($type == 'image/gif') ||($type == 'image/jpeg') ){
      if($size > 2000000){
        echo '<script>alert("image is too large")</script>';
      }else{
        move_uploaded_file($_FILES['ad-1']['tmp_name'], $target);
      }
    }else{echo '<script>alert("Only image is allow")</script>';}
  }
  //for ad panel-2
  if (isset($_POST['upload-2'])) {
    $newfilename = 'ad2.jpg';
    $target = "../ad/".$newfilename;
    $size = $_FILES['ad-2']['size'];
    $type = $_FILES['ad-2']['type'];
    if( ($type == 'image/png') ||($type == 'image/jpg') ||($type == 'image/gif') ||($type == 'image/jpeg') ){
      if($size > 2000000){
        echo '<script>alert("image is too large")</script>';
      }else{
        move_uploaded_file($_FILES['ad-2']['tmp_name'], $target);
      }
    }else{echo '<script>alert("Only image is allow")</script>';}
  }
  //for ad panel-3
  if (isset($_POST['upload-3'])) {
    $newfilename = 'ad3.jpg';
    $target = "../ad/".$newfilename;
    $size = $_FILES['ad-3']['size'];
    $type = $_FILES['ad-3']['type'];
    if( ($type == 'image/png') ||($type == 'image/jpg') ||($type == 'image/gif') ||($type == 'image/jpeg') ){
      if($size > 2000000){
        echo '<script>alert("image is too large")</script>';
      }else{
        move_uploaded_file($_FILES['ad-3']['tmp_name'], $target);
      }
    }else{echo '<script>alert("Only image is allow")</script>';}
  }
  //for ad panel-4
  if (isset($_POST['upload-4'])) {
    $newfilename = 'ad4.jpg';
    $target = "../ad/".$newfilename;
    $size = $_FILES['ad-4']['size'];
    $type = $_FILES['ad-4']['type'];
    if( ($type == 'image/png') ||($type == 'image/jpg') ||($type == 'image/gif') ||($type == 'image/jpeg') ){
      if($size > 2000000){
        echo '<script>alert("image is too large")</script>';
      }else{
        move_uploaded_file($_FILES['ad-4']['tmp_name'], $target);
      }
    }else{echo '<script>alert("Only image is allow")</script>';}
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hatkhula | Ad Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  
  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ad
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Ad Panel</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row" >
        <h3 class="text-danger text-center">Only You Can allow up to 2 MB or less than 2MB.</h3>
        <h4 class="text-danger text-center">All advertisement image size will need to be Height: 150 pixels & witdh: 1680 pixels</h4>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="col-md-6 col-xs-12">
          <!-- <input type="hidden" name="size" value="100000000"> -->
            <div class="form-group">
              <lable for="panel-1"> Ad panel-1 </label>
              <input id="panel-1" type="file" name="ad-1" class="form-control-file btn btn-success" required >
            </div>
            <button style="margin-left: 4px;" class="btn btn-info btn-lg btn-flat" type="submit" name="upload-1">Upload AD-1</button>
          </div>
        </form>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="col-md-6 col-xs-12">
          <!-- <input type="hidden" name="size" value="100000000"> -->
            <div class="form-group">
              <lable for="panel-2"> Ad panel-2</label>
              <input id="panel-2" type="file" name="ad-2" class="form-control-file btn btn-success" required >
            </div>
            <button style="margin-left: 4px;" class="btn btn-info btn-lg btn-flat" type="submit" name="upload-2">Upload AD-2</button>
          </div>
        </form>
      </div>
      <div class="row" >
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="col-md-6 col-xs-12">
          <!-- <input type="hidden" name="size" value="100000000"> -->
            <div class="form-group">
              <lable for="panel-3"> Ad panel-3</label>
              <input id="panel-3" type="file" name="ad-3" class="form-control-file btn btn-success" required >
            </div>
            <button style="margin-left: 4px;" class="btn btn-info btn-lg btn-flat" type="submit" name="upload-3">Upload AD-3</button>
          </div>
        </form>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="col-md-6 col-xs-12">
          <!-- <input type="hidden" name="size" value="100000000"> -->
            <div class="form-group">
              <lable for="panel-4"> Ad panel-4</label>
              <input id="panel-4" type="file" name="ad-4" class="form-control-file btn btn-success" required >
            </div>
            <button style="margin-left: 4px;" class="btn btn-info btn-lg btn-flat" type="submit" name="upload-4">Upload AD-4</button>
          </div>
        </form>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-right">
    <strong> &copy; 2018 SoftCare IT. All rights resereved.</strong><a href="http://www.softcareit.com/"  target="_blank"> SoftCare IT </a>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
