<?php
  session_start();
  include '../config.php';
  include 'product_action.php';
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
  <title>Admin | Products</title>
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
                <h1 class="box-title">Products</h1>
                <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" id="add_new" title="Add new product" class="btn btn-info"><i class="fa fa-edit"></i></button>
                <button type="button" style="display: none;"  id="close" class="btn btn-danger"><i class="fa fa-remove"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="col-md-12">
            	<?php if(isset($message)){ echo $message; } ?>
            	<div id="product_post" style="display: none;">
            		<div class="panel panel-default">
						<div class="panel-body">
						  	<form method="post" action="" id="insert_form" enctype="multipart/form-data" data-parsley-validate>
			            		<div class="row">
			            			<div class="col-md-4">
										<div class="form-group">
											<label>Category</label>
											<select class="form-control select2" name="category_id" style="width: 100%;" id="category_id" data-parsley-required data-parsley-error-message="Category is required">
											<?php 
												$sql = "SELECT * from categories where status = 1";
								                $query = mysqli_query($con,$sql);
								                while($row = mysqli_fetch_array($query)) {
											 ?>
											<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
											<?php } ?>
											</select>
							            </div> 
						            </div> 
						            <div class="col-md-4">
							            <div class="form-group">
							                <label class="col-form-label">Writer name</label>
							                <input type="text" class="form-control" name="writer_name" id="writer_name" placeholder="Writer name" data-parsley-required data-parsley-error-message="Writer name is required" list="writer_list">
							                <datalist id="writer_list">
							                	<?php 
												$sql_writer = "SELECT * from writer";
								                $query_writer = mysqli_query($con,$sql_writer);
								                while($row = mysqli_fetch_array($query_writer)) {
												?>
							                	<option value="<?php echo $row['name']; ?>">
							                	<?php } ?>
							                </datalist>
							            </div>
						            </div>
			            			<div class="col-md-4">
							            <div class="form-group">
							                <label class="col-form-label">Product name</label>
							                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product name" data-parsley-required data-parsley-error-message="Product name is required" >
							            </div>
						            </div>
						            <div class="col-md-2">
							            <div class="form-group">
							                <label class="col-form-label">Published year</label>
							                <input type="text" class="form-control" name="published_year" id="published_year" placeholder="Published year" >
							            </div>
						            </div>
						            <div class="col-md-2">
							            <div class="form-group">
							                <label class="col-form-label">Market price</label>
							                <input type="text" class="form-control" name="market_price" id="market_price" placeholder="Market price" >
							            </div>
						            </div>
						            <div class="col-md-2">
							            <div class="form-group">
							                <label class="col-form-label">Nilkhet price</label>
							                <input type="text" class="form-control" name="nilkhet_price" id="nilkhet_price" placeholder="Nilkhet price" >
							            </div>
						            </div>
						            <div class="col-md-4">
										<div class="form-group">
											<label>Book condtion</label>
											<select class="form-control select2" name="book_condition" style="width: 100%;" id="book_condition">
											<?php 
												$sql_book_condition = "SELECT * from book_condition";
								                $query_book_condition = mysqli_query($con,$sql_book_condition);
								                while($row = mysqli_fetch_array($query_book_condition)) {
											 ?>
											<option value="<?php echo $row['condition']; ?>"><?php echo $row['condition']; ?></option>
											<?php } ?>
											</select>
							            </div> 
						            </div> 
						            <div class="col-md-2">
							            <div class="form-group">
							                <label class="col-form-label">QTY</label>
							                <input type="text" class="form-control" name="qty" id="qty" placeholder="Quantity">
							            </div>
						            </div>
						            
						            <div class="col-md-4">
					                	<div class="form-group">
							                <label class="col-form-label">Image1*</label>
							                <input type="file" class="form-control-file" id="img1" name="img1" >
							                <input type="hidden" name="input_img1" id="input_img1">
							            </div>
						            </div>
						            <div class="col-md-4">
					                	<div class="form-group">
							                <label class="col-form-label">Image2</label>
							                <input type="file" class="form-control-file" id="img2" name="img2" >
							                <input type="hidden" name="input_img2" id="input_img2">
							            </div>
						            </div>
						            <div class="col-md-4">
					                	<div class="form-group">
							                <label class="col-form-label">Image3</label>
							                <input type="file" class="form-control-file" id="img3" name="img3" >
							                <input type="hidden" name="input_img3" id="input_img3">
							            </div>
						            </div>
									<div class="col-md-6">
										<div class="form-group">
							                <label class="col-form-label">Description</label>
							                <textarea type="text" class="form-control" id="description" name="description" rows="4" placeholder="Description"></textarea>
							            </div>
						            </div> 
									 
			            		</div> 
			            		<div class="row">
			            			<div class="col-md-4"> 
										<input type="hidden" name="product_id" id="product_id" />  
										<input type="submit" name="insert" id="insert" value="POST" class="btn btn-success btn-lg" /> 
									</div>
			            		</div>
					            
			                </form> 
						</div>
					</div>
            		
            	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            	<span id="product_list">
            	<?php 
            	echo '
            	<table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product ID</th>
                        <th>Category</th>
		                <th>Product name</th>
		                <th>Writer name</th>
		                <th>Market price</th>
		                <th>Nilkhet price</th>
		                <th>Book condition</th>
		                <th>QTY</th>
		                <th>Available QTY</th>
		                <th>Created at</th>
		                <th>Image</th>
		                <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
            	';
            	$sl = 1;
                $sql = "SELECT * from products where status = 1";
                $query = mysqli_query($con,$sql);
                if (mysqli_num_rows($query) > 0) {
                	while($row = mysqli_fetch_array($query)) {
                		$row_category =  mysqli_fetch_array(mysqli_query($con,"SELECT * from categories where id = '".$row['category_id']."'"));
                		// stock
                		$row_soild =  mysqli_fetch_array(mysqli_query($con,"SELECT sum(qty) as qty,product_id from order_products where product_id = '".$row['id']."'"));
                		$available = $row['qty']-$row_soild['qty'];
	                	echo '
	                	<tr>
	                        <td>'.$sl.'</td><td>'
	                        .$row['id'].
	                        '</td><td>'
	                        .$row_category['name'].
	                        '</td><td>'
	                        .$row['product_name'].
	                        '</td><td>'
	                        .$row['writer_name'].
	                        '</td><td>'
	                        .$row['market_price'].
	                        '</td><td>'
	                        .$row['nilkhet_price'].
	                        '</td><td>'
	                        .$row['book_condition'].
	                        '</td><td>'
	                        .$row['qty'].
	                        '</td><td>'
	                        .$available.
	                        '</td><td>'
	                        .date('F d, Y', strtotime($row['created_at'])).
	                        '</td><td><img height="70" width="70" src="../public/images/products/'
							.$row['img1'].
							'"><td><a class="add_qty" id="qtyadd_'.$row['id'].'"><i class="fa fa-plus"></i></a> || <a class="edit_data" id="edit_'.$row['id'].'"><i class="fa fa-edit"></i></a> || <a class="delete_product text-red" id="del_'.$row['id'].'"><i class="fa fa-remove"></i></a></td>
						</tr>';

	                	$sl++;
	                }
                }
                
            	echo '
            	</tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product ID</th>
                        <th>Category</th>
		                <th>Product name</th>
		                <th>Writer name</th>
		                <th>Market price</th>
		                <th>Nilkhet price</th>
		                <th>Book condition</th>
		                <th>QTY</th>
		                <th>Available QTY</th>
		                <th>Created at</th>
		                <th>Image</th>
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
<!-- model -->
<div id="add_data_Modal" class="modal fade">  
	<div class="modal-dialog">  
       <div class="modal-content">  
            <div class="modal-header">  
                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
                 <h4 class="modal-title">Add qty</h4>  
            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form" data-parsley-validate>
                	<div class="col-md-12">
			            <div class="form-group">
			                <label class="col-form-label">QTY</label>
			                <input type="number" class="form-control" name="qty" id="qty" placeholder="Quantity" data-parsley-required data-parsley-error-message="Max 50 qty add & it is required" data-parsley-max="50" autofocus>
			                <input type="hidden" class="form-control" name="current_qty" id="current_qty" >
			                <input type="hidden" name="p_id" id="p_id" />  
			            </div>
		            </div>
					<br /> 
					<div class="col-md-12">
			            <div class="form-group">
							<input type="submit" name="submit_qty" id="submi_qty" value="Add QTY" class="btn btn-success" /> 
						</div>
		            </div> 
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
<!-- CK Editor -->
<script src="../public/backend/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Field validation -->
<script type="text/javascript" src="../public/backend/dist/js/parsley.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  

    $(function () {
	    $("#success-alert").fadeOut(15000); 
        $('#example1').DataTable();
    })
    $(document).ready(function(){
    	// add qty
    	$(document).on('click', '.add_qty', function(){ 
	        var id = this.id;
	        var splitid = id.split('_');
	       // Delete id
	       var edit_id = splitid[1]; 
	       var edit = 'edit';
	       // alert(edit_id); 
           $.ajax({  
                url:"products",  
                method:"POST",  
                data:{product_id:edit_id, edit_product:edit},  
                dataType:"json",   
                success:function(data){ 
                	// alert(data.id); 
                    $('#p_id').val(data.id); 
                    $('#current_qty').val(data.qty);  
                    $('#add_data_Modal').modal('show');  
                }  
           });  
	    });

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
	                url:"products.php",  
	                method:"POST",  
	                data:{product_id:edit_id, edit_product:edit},  
	                dataType:"json",  
	                success:function(data){ 
	                	// alert(data); 
	                	$("#product_post").fadeIn(2000); 
				        $("#close").fadeIn(2000); 
				        $("#add_new").fadeOut(2000); 
				        $("#product_list").fadeOut(1000);
				        $('#insert_form')[0].reset();
	                     $('#product_name').val(data.product_name);  
	                     $('#category_id').val(data.category_id);  
	                     $('#description').val(data.description);  
	                     $('#market_price').val(data.market_price);  
	                     $('#nilkhet_price').val(data.nilkhet_price);  
	                     $('#book_condition').val(data.book_condition);  
	                     $('#published_year').val(data.published_year);  
	                     $('#writer_name').val(data.writer_name);  
	                     $('#qty').val(data.qty);  
	                     $('#input_img1').val(data.img1);  
	                     $('#input_img2').val(data.img2);  
	                     $('#input_img3').val(data.img3);  
	                     $('#product_id').val(data.id);  
	                     $('#insert').val("Update");   
	                }  
	           });  
	      });
	      // delete
	      $(document).on('click', '.delete_product', function(){ 
	      	if(confirm('Are you sure to remove this record ?')){
	        var el = this;
	       var id = this.id;
	       var splitid = id.split('_');

	       // Delete id
	       var delete_id = splitid[1];
	       var delete_product = 'delete';
	     	// alert(delete_id);
	       // AJAX Request
	       $.ajax({
	         url: 'products.php',
	         type: 'POST',
	         data: { product_id:delete_id, delete_product:delete_product },
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

	    $(document).on('click', '#add_new', function(){ 
	        $("#product_post").fadeIn(2000); 
	        $("#close").fadeIn(2000); 
	        $("#add_new").fadeOut(2000); 
	        $("#product_list").fadeOut(1000);
	        $('#insert_form')[0].reset();   
	        
	    }); 
	    $(document).on('click', '#close', function(){ 
	        $("#product_post").fadeOut(2000); 
	        $("#add_new").fadeIn(2000); 
	        $("#close").fadeOut(2000); 
	        $("#product_list").fadeIn(2000);
	        $('#insert').val("POST");
	        $('#product_id').val('');    
	        $('#input_img1').val('');    
	        $('#input_img2').val('');    
	        $('#input_img3').val('');    
	        $('#insert_form')[0].reset();
	    }); 

	 }); 
</script>
</body>
</html>
