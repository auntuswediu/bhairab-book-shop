<?php 
	session_start();
	include 'config.php';
	$row_contact = mysqli_fetch_array(mysqli_query($con,"SELECT * from contact_info"));
	if (isset($_POST['send'])) {
    	$sql_message = "INSERT INTO `messages`( `name`, `email`, `subject`, `message`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['subject']."','".$_POST['message']."')";
    	$query_message = mysqli_query($con,$sql_message);
    	if ($query_message) {
    		$message = '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>Thanks for your message</strong>
					</div>';
    	}else{
    		$message = '<div class="alert alert-danger" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>'.mysqli_error($con).'</strong>
					</div>';
    	}
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Book Shop – Contact Us</title>
    <?php include 'css.php'; ?>
</head>
    <body class="home-4">

<?php include 'header.php'; ?>
	<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#" class="active">contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- googleMap-area-start -->
		<div class="map-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?php echo $row_contact['map']; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- googleMap-end -->
		<!-- contact-area-start -->
		<div class="contact-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="contact-info">
							<h3>Contact info</h3>
							<ul>
								<li>
									<i class="fa fa-map-marker"></i>
									<span>Address: </span>
									<?php echo $row_contact['address']; ?> 							
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<span>Phone: </span>
									<?php echo $row_contact['phone']; ?> 
								</li>
								<li>
									<i class="fa fa-mobile"></i>
									<span>Email: </span>
									<a href="#"><?php echo $row_contact['email']; ?></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php if(isset($message)){ echo $message; } ?>
						<div class="contact-form">
							<h3><i class="fa fa-envelope-o"></i>Leave a Message</h3>
                            <form id="contact-form" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input name="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input name="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form-3">
                                            <input name="subject" type="text" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                         <div class="single-form-3">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <button class="submit" name="send" type="submit">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- contact-area-end -->
		<script type="text/javascript">
		$(document).ready(function(){  
			// view_product
			$(document).on('click', '.quick-view', function(){ 
				var id = this.id;
				var splitid = id.split('_');
				// view id
				var product_id = splitid[1]; 
				// alert(product_id); 
			    $.ajax({  
			        url:"product_short_view_modal.php"+'?p_id='+product_id,  
			        method:"POST",   
			        success:function(data){ 
			        	// alert(data); 
			            $('#short_product_view').html(data);   
			            $('#productModal').modal('show'); 
			        }  
			    });  
			});
			// quick-view add cart
			$(document).on('click', '.add_cart', function(){ 
				var id = this.id;
				var splitid = id.split('_');
				// view id
				var product_id = splitid[1]; 
				var qty = $('#qty').val(); 
				// alert(qty); 
			    $.ajax({  
			        url:'add_cart.php'+'?id='+product_id+'&qty='+qty,  
			        method:'GET',   
			        success:function(data){ 
			        	// alert(data); 
			        	$('#qty').val('1');
			            $('#shopping_cart').html(data);   
			            // $('#productModal').modal('show'); 
			        }  
			    });  
			});
			// modal close
			$(document).on('click', '.close', function(){ 
				$('#productModal').modal('hide'); 
				// $('#short_product_view').html('<span></span>');  
			});
			// add to cart
			$(document).on('click', '.add_to_cart', function(){ 
				var id = this.id;
				var splitid = id.split('_');
				// view id
				var product_id = splitid[1]; 
				// alert(product_id); 
			    $.ajax({  
			        url:"add_cart.php"+'?id='+product_id+'&qty='+1,  
			        method:"GET",   
			        success:function(data){ 
			        	// alert(data); 
			            $('#shopping_cart').html(data);   
			            // $('#productModal').modal('show'); 
			        }  
			    });  
			});
			
	    });

	    // Delete 
		$(document).on('click', '.remove_shoppiing_cart', function(){ 
			if(confirm('Are you sure to remove this record ?')){
	 			var id = this.id;
				var splitid = id.split('_');
				// view id
				var product_id = splitid[1]; 
				// alert(product_id); 
			    $.ajax({  
			        url:"add_cart.php"+'?remove_id='+product_id,  
			        method:"GET",   
			        success:function(data){ 
			        	// alert(data); 
			            $('#shopping_cart').html(data);   
			            // $('#productModal').modal('show'); 
			        }  
			    });  
			}
		}); 
		</script>
<?php include 'footer.php'; ?>
