<?php
session_start();
include 'config.php';
// for new add to cart
if (isset($_GET['id'])) {
	// stock check
	$row_product =  mysqli_fetch_array(mysqli_query($con,"SELECT * from products where id = '".$_GET['id']."'"));
    $row_soild =  mysqli_fetch_array(mysqli_query($con,"SELECT sum(qty) as qty,product_id from order_products where product_id = '".$_GET['id']."'"));
    $available = $row_product['qty']-$row_soild['qty'];
    if ($available<=0) {
    	echo '<script>alert("Stock not available");</script>';
    }else{
		if (isset($_SESSION['product'])) {
			foreach ($_SESSION['product'] as $product){
				if($product['id']==$_GET['id']){
					$current_qty = $_SESSION['product'][$_GET['id']]['qty']+$_GET['qty'];
				}
			}
			if(empty($current_qty)){
				$current_qty = $_GET['qty'];
			}
			
		}else{
			$current_qty = $_GET['qty'];
		}
		$_SESSION['product'][$_GET['id']] = array('id'=>$_GET['id'],
			'qty'=>$current_qty
		);
		echo '<script>alert("Add to cart added successful");</script>';
	}
}

// remove cart
if(isset($_GET['remove_id'])) {
	$product_id = $_GET['remove_id'];
	$product = $_SESSION['product'];
	unset($product[$product_id]);
	$_SESSION['product']= $product;
	// echo '<span>'.count($_SESSION['product']).'</span>';
	
}
if(isset($_SESSION['product'])){
	echo '<li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
	<span id="total_cart">';
	echo count($_SESSION['product']);
	echo '</span>
	<div class="mini-cart-sub">
		<div class="cart-product" style="max-height:200px;overflow-y: scroll;">';
		$t = 0;
		foreach ($_SESSION['product'] as $product){
				$row_cart_product = mysqli_fetch_array(mysqli_query($con,"SELECT * from products where id = '".$product['id']."' "));
				$t = $t+($product['qty']*$row_cart_product['unit_price']);
				echo '<div class="single-cart">
				<div class="cart-img">
					<a href="product-details?product_id='.$product['id'].'"><img src="public/images/products/'.$row_cart_product['img1'].'" alt="book" /></a>
				</div>
				<div class="cart-info">
					<h5><a href="product-details?product_id='.$product['id'].'">'.$row_cart_product['product_name'].'</a></h5>
					<p>'.$product['qty'].' x &#2547; '.$row_cart_product['unit_price'].'</p>
				</div>
				<div class="cart-icon">
				    <a class="remove_shoppiing_cart" id="remove_'.$product['id'].'"><i class="fa fa-remove"></i></a>
				</div>
			</div>';
		}
	echo '</div>
		<div class="cart-totals">
			<h5>Total <span>&#2547; '.$t.'</span></h5>
		</div>
		<div class="cart-bottom">
			<a class="view-cart" href="checkout">Check Out</a>
		</div>
	</div>';
}