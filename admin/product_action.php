<?php  
if(isset($_POST['insert'])) { 
	$product_name = $_POST['product_name'];
	$category_id = $_POST['category_id'];
	$writer_name = $_POST['writer_name'];
	$market_price = $_POST['market_price'];
	$nilkhet_price = $_POST['nilkhet_price'];
	$published_year = $_POST['published_year'];
	$book_condition = $_POST['book_condition'];
	$qty = $_POST['qty'];
	$description = $_POST['description'];

 	if (!empty($_FILES['img1']['tmp_name'])) {
 		$temp = explode(".",$_FILES["img1"]["name"]);
	    $newfilename_img1 = uniqid('', true).'.' . end($temp);
	    $target = "../public/images/products/".$newfilename_img1;
	    $type1 = $_FILES['img1']['type'];
	    if( ($type1 == 'image/png') ||($type1 == 'image/jpg') ||($type1 == 'image/gif') ||($type1 == 'image/jpeg') ){
	      move_uploaded_file($_FILES['img1']['tmp_name'], $target);
	    }
 	}elseif(!empty($_POST['input_img1'])){
 		$newfilename_img1 = $_POST['input_img1'];
 	}else{
 		$newfilename_img1 = '';
 	}

 	if (!empty($_FILES['img2']['tmp_name'])) {
 		$temp = explode(".",$_FILES["img2"]["name"]);
	    $newfilename_img2 = uniqid('', true).'.' . end($temp);
	    $target = "../public/images/products/".$newfilename_img2;
	    $type1 = $_FILES['img2']['type'];
	    if( ($type1 == 'image/png') ||($type1 == 'image/jpg') ||($type1 == 'image/gif') ||($type1 == 'image/jpeg') ){
	      move_uploaded_file($_FILES['img2']['tmp_name'], $target);
	    }
 	}elseif(!empty($_POST['input_img2'])){
 		$newfilename_img2 = $_POST['input_img2'];
 	}else{
 		$newfilename_img2 = '';
 	}

 	if (!empty($_FILES['img3']['tmp_name'])) {
 		$temp = explode(".",$_FILES["img3"]["name"]);
	    $newfilename_img3 = uniqid('', true).'.' . end($temp);
	    $target = "../public/images/products/".$newfilename_img3;
	    $type1 = $_FILES['img3']['type'];
	    if( ($type1 == 'image/png') ||($type1 == 'image/jpg') ||($type1 == 'image/gif') ||($type1 == 'image/jpeg') ){
	      move_uploaded_file($_FILES['img3']['tmp_name'], $target);
	    } 
 	}elseif(!empty($_POST['input_img3'])){
 		$newfilename_img3 = $_POST['input_img3'];
 	}else{
 		$newfilename_img3 = '';
 	}
 	
 	if($_POST["product_id"] != ''){
 		$product_id = $_POST["product_id"];  
        $query = " UPDATE `products` SET `product_name`='$product_name',`category_id`='$category_id',`published_year`='$published_year',`description`='$description',`market_price`='$market_price',`nilkhet_price`='$nilkhet_price',`book_condition`='$book_condition',`writer_name`='$writer_name',`qty`=$qty,`img1`='$newfilename_img1',`img2`='$newfilename_img2',`img3`='$newfilename_img3' WHERE id = $product_id ";  
        $message = 'Data updated';  
    }else {  
        $query = " INSERT INTO `products`(`product_name`,`published_year`,`writer_name`, `category_id`, `description`, `market_price`, `nilkhet_price`,`book_condition`, `qty`, `img1`, `img2`, `img3`) VALUES ('$product_name','$published_year','$writer_name','$category_id','$description','$market_price','$nilkhet_price', '$book_condition','$qty','$newfilename_img1','$newfilename_img2','$newfilename_img3') ";  
        $message = 'Data Inserted';  
    }
    if(mysqli_query($con, $query)) {
    	$message = '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>'.$message.'</strong>
					</div>';
    }else{
    	$message = '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>'.mysqli_error($con).'</strong>
					</div>';
    }
} 
if (isset($_POST['submit_qty'])) {
	$p_id = $_POST['p_id'];
	$qty = $_POST['current_qty']+$_POST['qty'];
	$query = " UPDATE `products` SET `qty`=$qty WHERE id = $p_id ";  
        $message = 'QTY added';  
    if(mysqli_query($con, $query)) {
    	$message = '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>'.$message.'</strong>
					</div>';
    }else{
    	$message = '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>'.mysqli_error($con).'</strong>
					</div>';
    }
}
if (isset($_POST['delete_product'])) {
	$id = $_POST['product_id'];
	// Check record exists
	$checkRecord = mysqli_query($con,"SELECT * FROM products WHERE id=".$id);
	$totalrows = mysqli_num_rows($checkRecord);

	if($totalrows > 0){
		$row = mysqli_fetch_array($checkRecord);
		if (!empty($row['img1']) && file_exists('../public/images/products/'.$row['img1'])) {
			unlink('../public/images/products/'.$row['img1']);
		}
		if (!empty($row['img2']) && file_exists('../public/images/products/'.$row['img2'])) {
			unlink('../public/images/products/'.$row['img2']);
		}
		if (!empty($row['img3']) && file_exists('../public/images/products/'.$row['img3'])) {
			unlink('../public/images/products/'.$row['img3']);
		}
	  // Delete record
	  $query = "DELETE FROM products WHERE id=".$id;
	  mysqli_query($con,$query);
	  echo 1;
	  exit;
	}

	echo 0;
	exit;
} 
if (isset($_POST['edit_product'])) {
	$id = $_POST['product_id'];
	// Check record exists
	$checkRecord = mysqli_query($con,"SELECT * FROM products WHERE id=".$id);
	$totalrows = mysqli_num_rows($checkRecord);

	$row = mysqli_fetch_array($checkRecord);
	echo json_encode($row);  
	exit;
 } 
?>