  <?php  
 //fetch.php  
 include '../config.php';
 if(isset($_GET["edit_category"]))  {  
	$query = "SELECT * FROM categories WHERE id = '".$_GET["category_id"]."'";  
	$result = mysqli_query($con, $query);  
	$row = mysqli_fetch_array($result);  
	echo json_encode($row);
	exit;  
 }
 if(isset($_GET["delete_category"]))  {  
    $id = $_GET['category_id'];

	if($id > 0){
	  // Check record exists
	  $checkRecord = mysqli_query($con,"SELECT * FROM categories WHERE id=".$id);
	  $totalrows = mysqli_num_rows($checkRecord);

	  if($totalrows > 0){
	    // Delete record
	    $query = "DELETE FROM categories WHERE id=".$id;
	    mysqli_query($con,$query);
	    echo 1;
	    exit;
	  }
	}

	echo 0;
	exit;
 }
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $category_name = mysqli_real_escape_string($con, $_POST["category_name"]);  
      $sl_no = mysqli_real_escape_string($con, $_POST["sl_no"]);  
      $parent_id = mysqli_real_escape_string($con, $_POST["parent_id"]);  
      $description = mysqli_real_escape_string($con, $_POST["description"]);  
      $url = mysqli_real_escape_string($con, $_POST["url"]);  
      $category_id = mysqli_real_escape_string($con, $_POST["category_id"]);  
      if($_POST["category_id"] != '')  
      {  
           $query = "  
           UPDATE categories   
           SET name='$category_name',   
           parent_id='$parent_id',   
           sl_no='$sl_no',   
           description='$description', 
           url='$url'  
           WHERE id='".$_POST["category_id"]."'";  
           $message = 'Data updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO categories(name, parent_id, sl_no, description, url)  
           VALUES('$category_name', '$parent_id', '$sl_no', '$description', '$url');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($con, $query))  { 
      	$output .= '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>'.$message.'</strong>
					</div>';
            $output .= '
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
                
            	$output .= '
            	</tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Category ID</th>
		                <th>Category name</th>
		                <th>Parent ID</th>
		                <th>Category url</th>
		                <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                </table>
            	';
            	$output .="<script>$(function () {
        $('#example1').DataTable()
    })
</script>";	
 
      }  
      echo $output;  
 }      
 ?>