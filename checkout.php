<?php 
	session_start();
	include 'config.php';
	if (isset($_SESSION['role'])) {
	  $role = $_SESSION['role'];
	}else{
	  $role = '';
	}
	if (empty($_SESSION['id']) && $role != 'user' ) {
	  header("Location: login");
	}
	if (isset($_POST['order_confirm'])) {
		// invoice generate 
		$sql_invoice = "INSERT INTO `invoice`(`user_id`) VALUES ('".$_SESSION['id']."')";
		$query_invoice = mysqli_query($con, $sql_invoice);
		if ($query_invoice) {
			$last_invoice_id = mysqli_insert_id($con);
		}
		// product order 
		foreach ($_SESSION['product'] as $product){
			$sql_order_product = "INSERT INTO `order_products`(`invoice_id`, `product_id`, `qty`) VALUES ('$last_invoice_id','".$product['id']."','".$product['qty']."')";
			mysqli_query($con, $sql_order_product);
		}
		// shipping address
		if (isset($_POST['ship_different'])) {
			$sql_delivery_info = "INSERT INTO `delivery_info`(`invoice_id`, `name`, `phone`, `address`, `city`, `post_code`, `email`, `note`, `company_name`) VALUES ('$last_invoice_id','".$_POST['first_name'].';'.$_POST['last_name']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['city']."','".$_POST['post_code']."','".$_POST['email']."','".$_POST['note']."','".$_POST['company_name']."')";
		}else{
			$sql_delivery_info = "INSERT INTO `delivery_info`(`invoice_id`, `name`, `phone`, `address`, `city`, `post_code`, `email`, `note`, `company_name`) VALUES ('$last_invoice_id','".$_POST['b_first_name'].';'.$_POST['b_last_name']."','".$_POST['b_phone']."','".$_POST['b_address']."','".$_POST['b_city']."','".$_POST['b_post_code']."','".$_POST['b_email']."','".$_POST['note']."','".$_POST['b_company_name']."')";
		}
		mysqli_query($con, $sql_delivery_info);
		// billing details
		if (!empty($_POST['b_first_name'])) {
			$result_check_billing_details = mysqli_query($con, "SELECT * FROM billing_details where user_id = '".$_SESSION['id']."'");
			if (mysqli_num_rows($result_check_billing_details) <= 0) {
			  $sql_billing_details = "INSERT INTO `billing_details`(`user_id`, `name`, `phone`, `address`, `city`, `post_code`, `email`, `company_name`) VALUES ('".$_SESSION['id']."','".$_POST['b_first_name'].';'.$_POST['b_last_name']."','".$_POST['b_phone']."','".$_POST['b_address']."','".$_POST['b_city']."','".$_POST['b_post_code']."','".$_POST['b_email']."','".$_POST['b_company_name']."')";
			}else{
				$sql_billing_details = "UPDATE `billing_details` SET `name`='".$_POST['b_first_name'].';'.$_POST['b_last_name']."',`phone`='".$_POST['b_phone']."',`address`='".$_POST['b_address']."',`city`='".$_POST['b_city']."',`post_code`='".$_POST['b_post_code']."',`email`='".$_POST['b_email']."',`company_name`='".$_POST['b_company_name']."' WHERE `user_id`='".$_SESSION['id']."'";
			}
			mysqli_query($con, $sql_billing_details);
		}
		// payment 
		$sql_payment = "INSERT INTO `payment`(`invoice_id`, `trx_method`, `trx_phone`, `trx_id`, `trx_amount`) VALUES ('".$last_invoice_id."','".$_POST['trx_method']."','".$_POST['trx_phone']."','".$_POST['trx_id']."','".$_POST['trx_amount']."')";
		mysqli_query($con, $sql_payment);
		// echo mysqli_error($con);
		$msg = 'Thank You For Your Order';
		$_SESSION['product'] = array();
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Book Shop – Checkout</title>
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
								<li><a href="#" class="active">checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<?php if (!empty($_SESSION['product'])): ?>
		<!-- checkout-area-start -->
		<div class="checkout-area mb-70">
			<div class="container">
				<div class="row">
					<form action="" method="post">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="checkbox-form">						
								<h3>Billing Details</h3>
								<?php 
								$result_billing_details = mysqli_query($con, "SELECT * FROM billing_details where user_id = '".$_SESSION['id']."'");
								$row_billing_details = mysqli_fetch_assoc($result_billing_details);
								$name = explode(";",$row_billing_details['name']);
								?>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="checkout-form-list">
											<label>First Name <span class="required">*</span></label>
											<input type="text" name="b_first_name" value="<?php echo $name[0]; ?>" placeholder="">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="checkout-form-list">
											<label>Last Name <span class="required">*</span></label>
											<input type="text" name="b_last_name" value="<?php if(isset($name[1])){echo $name[1];}  ?>" placeholder="">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="checkout-form-list">
											<label>Company Name</label>
											<input type="text" name="b_company_name" value="<?php echo $row_billing_details['company_name']; ?>" placeholder="">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="checkout-form-list">
											<label>Address <span class="required">*</span></label>
											<input type="text" name="b_address" value="<?php echo $row_billing_details['address']; ?>" placeholder="Street address">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="checkout-form-list">
											<label>Town / City <span class="required">*</span></label>
											<input type="text" name="b_city" value="<?php echo $row_billing_details['city']; ?>" placeholder="Town / City">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="checkout-form-list">
											<label>Postcode / Zip <span class="required">*</span></label>
											<input type="text" name="b_post_code" value="<?php echo $row_billing_details['post_code']; ?>" placeholder="Postcode / Zip">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="checkout-form-list">
											<label>Email Address <span class="required">*</span></label>
											<input type="email" name="b_email" value="<?php echo $row_billing_details['email']; ?>" placeholder="">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="checkout-form-list">
											<label>Phone  <span class="required">*</span></label>
											<input type="text" value="<?php echo $row_billing_details['phone']; ?>" name="b_phone" placeholder="Phone">
										</div>
									</div>								
								</div>
								<div class="different-address">
										<div class="ship-different-title">
											<h3>
												<label>Ship to a different address?</label>
												<input type="checkbox" name="ship_different" id="ship-box">
											</h3>
										</div>
									<div class="row" id="ship-box-info" style="display: none;">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="checkout-form-list">
												<label>First Name <span class="required">*</span></label>										
												<input type="text" name="first_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="checkout-form-list">
												<label>Last Name <span class="required">*</span></label>										
												<input type="text" name="last_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="checkout-form-list">
												<label>Company Name</label>
												<input type="text" name="company_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="checkout-form-list">
												<label>Address <span class="required">*</span></label>
												<input type="text" name="address" placeholder="Street address">
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="checkout-form-list">
												<label>Town / City <span class="required">*</span></label>
												<input type="text" name="city" placeholder="Town / City">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="checkout-form-list">
												<label>Postcode / Zip <span class="required">*</span></label>										
												<input type="text" name="post_code" placeholder="Postcode / Zip">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="checkout-form-list">
												<label>Email Address <span class="required">*</span></label>										
												<input type="email" name="email" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="checkout-form-list">
												<label>Phone  <span class="required">*</span></label>										
												<input type="text" name="phone" placeholder="Phone">
											</div>
										</div>								
									</div>
									<div class="order-notes">
										<div class="checkout-form-list">
											<label>Order Notes</label>
											<textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery." rows="10" cols="30" id="checkout-mess"></textarea>
										</div>									
									</div>
								</div>													
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="your-order">
								<h3>Your order</h3>
								<div class="your-order-table table-responsive">
									<table>
										<thead>
											<tr>
												<th class="product-name">Product</th>
												<th class="product-total">Total</th>
											</tr>							
										</thead>
										<tbody>
										<?php 
											$t = 0;
											foreach ($_SESSION['product'] as $product):
											$row_cart_product = mysqli_fetch_array(mysqli_query($con,"SELECT * from products where id = '".$product['id']."' "));
											$t = $t+($product['qty']*$row_cart_product['unit_price']); 
										?>
											<tr class="cart_item">
												<td class="product-name">
													<?php echo $row_cart_product['product_name']; ?> <strong class="product-quantity"> × <?php echo $product['qty']; ?></strong>
												</td>
												<td class="product-total">
													<span class="amount">&#2547; <?php echo $row_cart_product['unit_price']; ?></span>
												</td>
											</tr>
										<?php endforeach ?>
										</tbody>
										<tfoot>
											<tr class="cart-subtotal">
												<th>Cart Subtotal</th>
												<td><span class="amount">&#2547; <?php echo $t; ?></span></td>
											</tr>
											<tr class="shipping">
												<th>Shipping</th>
												<td><span class="amount">&#2547; <?php echo $shipping = 60; ?></span></td>
											</tr>
											<tr class="order-total">
												<th>Order Total</th>
												<td><strong><span class="amount">&#2547; <?php echo $t+$shipping; ?></span></strong>
												</td>
											</tr>								
										</tfoot>
									</table>
								</div>
								<div class="payment-method">
									<div class="payment-accordion">
										<div class="collapses-group">
											<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOne">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															  Payment
															</a>
														</h4>
													</div>
													<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
														<div class="panel-body">
															<div class="checkbox-form">						
																<div class="row">
																	<div class=" col-lg-12">
																		<div class="country-select">
																			<label>Trx Method <span class="required">*</span></label>
																			<select name="trx_method">
																			  <option value="B-kash">B-kash</option>
																			  <option value="Rocket">Rocket</option>
																			  <option value="U-cash">U-cash</option>
																			  <option value="Others">Others</option>
																			</select> 										
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
																		<div class="checkout-form-list">
																			<label>Trx Phone Number <span class="required">*</span></label>										
																			<input type="text" name="trx_phone" placeholder="">
																		</div>
																	</div>
																	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																		<div class="checkout-form-list">
																			<label>Trx ID <span class="required">*</span></label>
																			<input type="text" name="trx_id" placeholder="">
																		</div>
																	</div>
																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																		<div class="checkout-form-list">
																			<label>Trx Amount</label>
																			<input type="text" name="trx_amount" placeholder="">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingTwo">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
															  Cheque Payment
															</a>
														</h4>
													</div>
													<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
														<div class="panel-body">
															<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingThree">
														<h4 class="panel-title">
															<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
															 PayPal <img src="public/frontend/img/2.png" alt="payment" />
															</a>
														</h4>
													</div>
													<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
													  <div class="panel-body">
															<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
													  </div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
									<div class="order-button-payment">
										<input type="submit" name="order_confirm" value="Place order">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- checkout-area-end -->	
		<?php elseif(isset($msg)): ?>
		<!-- coupon-area-area-start -->
		<div class="coupon-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="coupon-accordion text-center">
							<h3><?php echo $msg; ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- coupon-area-area-end -->
		<?php else: ?>
		<!-- coupon-area-area-start -->
		<div class="coupon-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="coupon-accordion text-center">
							<h3>Your cart is empty...</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- coupon-area-area-end -->
		<?php endif ?>
		

<?php include 'footer.php'; ?>
