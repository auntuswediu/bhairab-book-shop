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
  <title>Admin | Categories</title>
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
    <!-- Field validation css -->
	<link rel="stylesheet" href="../public/backend/dist/css/parsley.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/backend/dist/css/skins/_all-skins.min.css">
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
                <h1 class="box-title">Categories</h1>
                <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add new category</button>
              </div>
              <!-- /. tools -->
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive" id="categories">
            	<?php 
            	echo '
            	<table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Category ID</th>
		                <th>Category name</th>
		                <th>Parent ID</th>
		                <th>Category url</th>
		                <th>Description</th>
		                <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
            	';
            	$sl = 1;
                $sql = "SELECT * from categories";
                $query = mysqli_query($con,$sql);
                if (mysqli_num_rows($query) > 0) {
                	while($row = mysqli_fetch_array($query)) {

	                	echo '
	                	<tr>
	                        <td>
	                        '
	                        .$row['sl_no'].
	                        '</td><td>'
	                        .$row['id'].
	                        '</td><td>'
	                        .$row['name'].
	                        '</td><td>'
	                        .$row['parent_id'].
	                        '</td><td>'
	                        .$row['url'].
	                        '</td><td>'
							.$row['description'].
							'<td><a class="edit_data" id="edit_'.$row['id'].'"><i class="fa fa-edit"></i></a> || <a class="delete_category text-red" id="del_'.$row['id'].'"><i class="fa fa-remove"></i></a></td>
						</tr>';

	                	$sl++;
	                }
                }
                
            	echo '
            	</tbody>
                    <tfoot>
                    <tr>
                        <th>SL NO</th>
                        <th>Category ID</th>
		                <th>Category name</th>
		                <th>Parent ID</th>
		                <th>Category url</th>
		                <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                </table>
            	';
            	 ?>
                    
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

<!-- model -->
<div id="add_data_Modal" class="modal fade">  
	<div class="modal-dialog">  
       <div class="modal-content">  
            <div class="modal-header">  
                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                 <h4 class="modal-title">Add new category</h4>  
            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form" data-parsley-validate>
                	<div class="form-group">
		                <label class="col-form-label">SL NO</label>
		                <input type="text" class="form-control" name="sl_no" id="sl_no" placeholder="SL NO" data-parsley-required data-parsley-error-message="SL NO is required" autofocus>
		            </div>
					<br />   
                    <div class="form-group">
		                <label class="col-form-label">Category name</label>
		                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category name" data-parsley-required data-parsley-error-message="Category name is required" >
		            </div>
					<br />  
					<div class="form-group">
						<label>Category Level</label>
							<select class="form-control select2" name="parent_id" style="width: 100%;" id="parent_id">
							<option selected="selected" value="0">Main category</option>
							<?php 
								$sql = "SELECT * from categories where parent_id = 0";
				                $query = mysqli_query($con,$sql);
				                while($row = mysqli_fetch_array($query)) {
							 ?>
							<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php } ?>
							</select>
		            </div>  
					<div class="form-group">
		                <label class="col-form-label">Description</label>
		                  <input type="text" class="form-control" id="description" name="description" placeholder="Description">
		            </div>
					<div class="form-group">
		                <label class="col-form-label">URL</label>
		                  <input type="text" class="form-control" id="url" name="url" placeholder="URL" >
		            </div>
					<br />  
					<input type="hidden" name="category_id" id="category_id" />  
					<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                </form>  
            </div>  
            <div class="modal-footer">  
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
            </div>  
       </div>  
	</div>  
</div>

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
<!-- Field validation -->
<script type="text/javascript" src="../public/backend/dist/js/parsley.min.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
    })
     $(document).ready(function(){ 

	      $('#add').click(function(){  
	           $('#insert').val("Insert");  
	           $('#insert_form')[0].reset();  
	      });  
	      // edit
	      $(document).on('click', '.edit_data', function(){ 
	        var id = this.id;
	        var splitid = id.split('_');
	       // Delete id
	       var edit_id = splitid[1]; 
	       var edit = 'edit';
	       // alert(edit_id); 
	           $.ajax({  
	                url:"fetch_category.php",  
	                method:"GET",  
	                data:{category_id:edit_id, edit_category:edit},  
	                dataType:"json",  
	                success:function(data){ 
	                	// alert(data); 
	                     $('#category_name').val(data.name);  
	                     $('#parent_id').val(data.parent_id);  
	                     $('#description').val(data.description);  
	                     $('#url').val(data.url);  
	                     $('#sl_no').val(data.sl_no);  
	                     $('#category_id').val(data.id);  
	                     $('#insert').val("Update");  
	                     $('#add_data_Modal').modal('show');  
	                }  
	           });  
	      });
	      // delete
	      $(document).on('click', '.delete_category', function(){ 
	      	if(confirm('Are you sure to remove this record ?')){
	        var el = this;
	       var id = this.id;
	       var splitid = id.split('_');

	       // Delete id
	       var delete_id = splitid[1];
	       var delete_category = 'delete';
	     	// alert(delete_id);
	       // AJAX Request
	       $.ajax({
	         url: 'fetch_category.php',
	         type: 'GET',
	         data: { category_id:delete_id, delete_category:delete_category },
	         success: function(response){
	          // alert(delete_id);
	          if(response == 1){
	          	// alert(response);
	           // Remove row from HTML Table
	           $(el).closest('tr').css('background','tomato');
	           $(el).closest('tr').fadeOut(800,function(){
	              $(this).remove();
	           });
	          }else{
	            alert('Invalid ID.');
	          }

	        }
	       });  
	   		}
	     });  

	      $('#insert_form').on("submit", function(event){  
              $.ajax({  
                   url:"fetch_category.php",  
                   method:"POST",  
                   data:$('#insert_form').serialize(),  
                   beforeSend:function(){  
                        $('#insert').val("Inserting");  
                   },  
                   success:function(data){  
                        $('#insert_form')[0].reset();  
                        $('#add_data_Modal').modal('hide');  
                        $('#categories').html(data);
                        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
					      $("#success-alert").slideUp(500);
					    });  
                   }  
              });  
	      }); 

	 }); 
</script>
</body>
</html>
