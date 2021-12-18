<!-- header-area-start -->
<header>
	<!-- header-top-area-start -->
	<div class="header-top-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<!-- <div class="language-area">
						<ul>
							<li><img src="public/frontend/img/flag/1.jpg" alt="flag" /><a href="#">English<i class="fa fa-angle-down"></i></a>
								<div class="header-sub">
									<ul>
										<li><a href="#"><img src="public/frontend/img/flag/2.jpg" alt="flag" />france</a></li>
										<li><a href="#"><img src="public/frontend/img/flag/3.jpg" alt="flag" />croatia</a></li>
									</ul>
								</div>
							</li>
							<li><a href="#">USD $<i class="fa fa-angle-down"></i></a>
								<div class="header-sub dolor">
									<ul>
										<li><a href="#">EUR €</a></li>
										<li><a href="#">USD $</a></li>
									</ul>
								</div>
							</li>
						</ul>
					</div> -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="account-area text-right">
						<ul>
							<?php 
								if (isset($_SESSION['role'])) {
								    $role = $_SESSION['role'];
								}else{
								    $role = '';
								}
								if (isset($_SESSION['email']) && $role == 'user' ) {
									echo '<li><a href="profile">My Account</a></li>';
									echo '<li><a href="logout">Sign out</a></li>';
								}else{
									echo '<li><a href="login">Sign in</a></li>';
									echo '<li><a href="register">Register</a></li>';
								}
							?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header-top-area-end -->
	<!-- header-mid-area-start -->
	<div class="header-mid-area ptb-40">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<div class="logo-area">
						<a href="index"><img src="public/frontend/img/logo/3.png" alt="logo" /></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
					<div class="header-search">
						<form action="#">
							<input type="text" placeholder="Search entire store here..." />
							<a href="#"><i class="fa fa-search"></i></a>
						</form>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="my-cart">
						<ul id="shopping_cart">
							<?php 
								if(isset($_SESSION['product'])){
									echo '<li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
									<span>';
									echo count($_SESSION['product']);
									echo '</span>
								<div class="mini-cart-sub">
									<div class="cart-product" style="max-height:200px;overflow-y: scroll;">';
									$t = 0;
									foreach ($_SESSION['product'] as $product){
											$row_cart_product = mysqli_fetch_array(mysqli_query($con,"SELECT * from products where id = '".$product['id']."' "));
											$t = $t+($product['qty']*$row_cart_product['market_price']);
											echo '<div class="single-cart">
											<div class="cart-img">
												<a href="product-details?product_id='.$product['id'].'"><img src="public/images/products/'.$row_cart_product['img1'].'" alt="book" /></a>
											</div>
											<div class="cart-info">
												<h5><a href="product-details?product_id='.$product['id'].'">'.$row_cart_product['product_name'].'</a></h5>
												<p>'.$product['qty'].' x &#2547; '.$row_cart_product['market_price'].'</p>
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
										<a class="view-cart" href="checkout">check out</a>
										
									</div>
								</div>';
								}else{
									echo '<li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a></li>';	
								}
							?>							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header-mid-area-end -->
	<!-- main-menu-area-start -->
	<div class="main-menu-area hidden-sm hidden-xs" id="header-sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="menu-area">
						<nav>
							<ul>
								<li <?php if (stripos($_SERVER['REQUEST_URI'],'index') !== false) {echo 'class="active"';} ?>><a href="index">Home</a></li>
								<?php 
                            	$sql_categories = "SELECT * from categories where parent_id = 0 order by id asc";
				                $query_categories = mysqli_query($con,$sql_categories);
				                if (mysqli_num_rows($query_categories) > 0) {
				                	while($row_category = mysqli_fetch_array($query_categories)) {
				                		// sub_category
				                		$sql_sub_categories = "SELECT * from categories where parent_id = '".$row_category['id']."' order by id asc";
						                $query_sub_categories = mysqli_query($con,$sql_sub_categories);
						                $num_rows_sub_categories = mysqli_num_rows($query_sub_categories);
						                
	                            ?>
								<li class=""><a href="products?category_id=<?php echo $row_category['id']; ?>"><?php echo $row_category['name']; if($num_rows_sub_categories > 0){echo '<i class="fa fa-angle-down"></i>';} ?></a>
									<?php 
									if ($num_rows_sub_categories > 0) {
									?>
									<div class="mega-menu">
										<?php 
										while($row_sub_category = mysqli_fetch_array($query_sub_categories)) {
										?>
										<span>
											<a href="products?category_id=<?php echo $row_sub_category['id']; ?>"><?php echo $row_sub_category['name']; ?></a>
										</span>
										<?php 
										}
										?>
									</div>
									<?php 
									}
									?>
								</li>
								<?php 
									}
								}
								?>

								<li <?php if (stripos($_SERVER['REQUEST_URI'],'contact') !== false) {echo 'class="active"';} ?>><a href="contact">contact us</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- main-menu-area-end -->
	<!-- mobile-menu-area-start -->
	<div class="mobile-menu-area hidden-md hidden-lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="mobile-menu">
						<nav id="mobile-menu-active">
							<ul id="nav">
								<?php 
                            	$sql_categories = "SELECT * from categories where parent_id = 0 order by id asc";
				                $query_categories = mysqli_query($con,$sql_categories);
				                if (mysqli_num_rows($query_categories) > 0) {
				                	while($row_category = mysqli_fetch_array($query_categories)) {
				                		// sub_category
				                		$sql_sub_categories = "SELECT * from categories where parent_id = '".$row_category['id']."' order by id asc";
						                $query_sub_categories = mysqli_query($con,$sql_sub_categories);
						                $num_rows_sub_categories = mysqli_num_rows($query_sub_categories);
						                
	                            ?>
								<li class=""><a href="products?category_id=<?php echo $row_sub_category['id']; ?>"><?php echo $row_category['name']; if($num_rows_sub_categories > 0){echo '<i class="fa fa-angle-down"></i>';} ?></a>
									<?php 
									if ($num_rows_sub_categories > 0) {
									?>
									<ul>
										<?php 
										while($row_sub_category = mysqli_fetch_array($query_sub_categories)) {
										?>
										<li>
											<a href="products?category_id=<?php echo $row_sub_category['id']; ?>"><?php echo $row_sub_category['name']; ?></a>
										</li>
										<?php 
										}
										?>
									</ul>
									<?php 
									}
									?>
								</li>
								<?php 
									}
								}
								?>
								<li><a href="contact.html">contact us</a></li>
								
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- mobile-menu-area-end -->
</header>
<!-- header-area-end -->