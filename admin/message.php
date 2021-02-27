<?php
  session_start();
  include '../config.php';
  if ( !isset($_SESSION['email']) && $_SESSION['role'] != 'admin' ) {
    header("Location: login");
  }



  if (isset($_GET['message_id'])) {
    $id = $_GET['message_id'];
    $query = "DELETE FROM messages WHERE id='$id'";
    if (mysqli_query($con,$query)) {
      $m = '<div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Delete successful</strong>
          </div>';
    }else{
      $m = '<div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>'.mysqli_error($con).'</strong>
          </div>';
    }
  } 
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../public/backend/images/11.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Message</title>
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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                <h1 class="box-title">Message</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php 
                  if (isset($m)) {
                    echo $m;
                  }
               ?>
              <?php 
              echo '
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
              ';
              $sl = 1;
                $sql = "SELECT * from messages order by id desc";
                $query = mysqli_query($con,$sql);
                if (mysqli_num_rows($query) > 0) {
                  while($row = mysqli_fetch_array($query)) {
                    echo '
                    <tr>
                        <td>
                        '
                        .$sl.
                        '</td><td>'
                        .$row['name'].
                        '</td><td>'
                        .$row['email'].
                        '</td><td>'
                        .$row['subject'].
                        '</td><td>'
                        .$row['message'].
                        '</td><td>'
                        .date('F d, Y', strtotime($row['created_at'])).
                        '</td><td class="text-center"><a class="text-red" href="?message_id='
                        .$row['id'].
                        '"><i class="fa fa-remove"></i></a></td>
                    </tr>';

                    $sl++;
                  }
                }
                
              echo '
              </tbody>
                    <tfoot>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                </table>
              ';
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
</script>
<script>
    $(function () {
        $('#example1').DataTable()
    })
</script>
</body>
</html>
