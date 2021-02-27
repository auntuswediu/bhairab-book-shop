<?php 
	session_start();
	include 'config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Book Shop – Products</title>
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
								<li><a href="#" class="active">products</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- shop-main-area-start -->
		<div class="shop-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="shop-left">

							<div class="left-title mb-20">
								<h4>Category</h4>
							</div>
							<div class="left-menu mb-30">
								<ul>
								<?php 
								$sql_categories = "SELECT * from categories where parent_id!=0";
				                $query_categories = mysqli_query($con,$sql_categories);
				                if (mysqli_num_rows($query_categories) > 0) {
				                	while($row_category = mysqli_fetch_array($query_categories)){
						                $query_product = mysqli_query($con,"SELECT * from products where category_id='".$row_category['id']."'");
						                
				                		echo '<li><a href="products?category_id='.$row_category['id'].'">'.$row_category['name'].'<span>('.mysqli_num_rows($query_product).')</span></a></li>';
				                	}
				            	}
								?>
								</ul>
							</div>
							<div class="left-title mb-20">
								<h4>Random</h4>
							</div>
							<div class="random-area mb-30">
								<div class="product-active-2 owl-carousel">
									<div class="product-total-2">
										<?php 
		                            	$sql = "SELECT * from products where status = 1 order by RAND() limit 3";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            	?>
										<div class="single-most-product bd mb-18">
											<div class="most-product-img">
												<a href="product-details?product_id=<?php echo $row['id']; ?>"><img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" /></a>
											</div>
											<div class="most-product-content">
												<h4><a href="product-details?product_id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h4>
												<div class="product-price">
													<ul>
														<li>&#2547; <?php echo $row['unit_price']; ?></li>
														<!-- <li class="old-price">$33.00</li> -->
													</ul>
												</div>
											</div>
										</div>
										<?php 
											}
										}
										?>
									</div>
									<div class="product-total-2">
										<?php 
		                            	$sql = "SELECT * from products where status = 1 order by RAND() limit 3";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            	?>
										<div class="single-most-product bd mb-18">
											<div class="most-product-img">
												<a href="product-details?product_id=<?php echo $row['id']; ?>"><img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" /></a>
											</div>
											<div class="most-product-content">
												<h4><a href="product-details?product_id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h4>
												<div class="product-price">
													<ul>
														<li>&#2547; <?php echo $row['unit_price']; ?></li>
														<!-- <li class="old-price">$33.00</li> -->
													</ul>
												</div>
											</div>
										</div>
										<?php 
											}
										}
										?>
									</div>	
								</div>
							</div>
							<div class="banner-area mb-30">
								<div class="banner-img-2">
									<a href="#"><img src="public/frontend/img/banner/31.jpg" alt="banner" /></a>
								</div>
							</div>
							<!-- <div class="left-title-2 mb-30">
								<h2>Compare Products</h2>
								<p>You have no items to compare.</p>
							</div>
							<div class="left-title-2">
								<h2>My Wish List</h2>
								<p>You have no items in your wish list.</p>
							</div> -->
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<div class="category-image mb-30">
							<a href="#"><img src="public/frontend/img/banner/11.jpg" alt="banner" /></a>
						</div>
						<div class="section-title-5 mb-30">
							<h2>
								<?php 
								$sql_categories = "SELECT name from categories where id='".$_GET['category_id']."'";
				                $query_categories = mysqli_query($con,$sql_categories);
				                if (mysqli_num_rows($query_categories) > 0) {
				                	$row_category = mysqli_fetch_array($query_categories);
				                	echo $row_category['name'];
				            	}
								?>
							</h2>
						</div>
						<div class="toolbar mb-30">
							<div class="shop-tab">
								<div class="tab-3">
									<ul>
										<li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-th-large"></i>Grid</a></li>
										<li><a href="#list" data-toggle="tab"><i class="fa fa-bars"></i>List</a></li>
									</ul>
								</div>
							</div>
							
						</div>
						<!-- tab-area-start -->
						<div class="tab-content">
							<div class="tab-pane active" id="th">
							    <div class="row">
							    	<?php 
		                            	$sql = "SELECT * from products where category_id='".$_GET['category_id']."' and status = 1 order by id desc";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            ?>
							        <div class="col-lg-3 col-md-4 col-sm-6">
							            <!-- single-product-start -->
                                        <div class="product-wrapper mb-40">
                                            <div class="product-img">
			                                    <a href="<?php echo $row['id']; ?>">
			                                        <img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" />
			                                    </a>
			                                    <div class="quick-view" id="view_<?php echo $row['id']; ?>">
			                                        <a class="action-view" title="Quick View">
			                                            <i class="fa fa-search-plus"></i>
			                                        </a>
			                                    </div>
			                                    <!-- <div class="product-flag">
			                                        <ul>
			                                            <li><span class="sale">new</span></li>
			                                            <li><span class="discount-percentage">-5%</span></li>
			                                        </ul>
			                                    </div> -->
			                                </div>
                                            <div class="product-details text-center">
			                                    <h4><a href="product-details?product_id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h4>
			                                    <div class="product-price">
			                                        <ul>
			                                            <li>&#2547; <?php echo $row['unit_price']; ?></li>
			                                        </ul>
			                                    </div>
			                                </div>
                                            <div class="product-link">
			                                    <div class="product-button">
			                                        <a class="add_to_cart" id="cart_<?php echo $row['id']; ?>" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			                                    </div>
			                                    <div class="add-to-link">
			                                        <ul>
			                                            <li><a href="product-details?product_id=<?php echo $row['id']; ?>" title="Details"><i class="fa fa-external-link"></i></a></li>
			                                        </ul>
			                                    </div>
			                                </div> 	
                                        </div>
                                        <!-- single-product-end -->
							        </div>
							        <?php 
		                            	}
		                            }else{
		                            ?>
		                            <div class="col-lg-12 product-details text-center">Data not found</div>
		                            <?php 
		                        	}
		                            ?>
							    </div>
							</div>
							<div class="tab-pane fade" id="list">
								<?php 
	                            	$sql = "SELECT * from products where category_id='".$_GET['category_id']."' and status = 1 order by id desc";
					                $query = mysqli_query($con,$sql);
					                if (mysqli_num_rows($query) > 0) {
					                	while($row = mysqli_fetch_array($query)) {
	                            ?>
								<!-- single-shop-start -->
								<div class="single-shop mb-30">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="product-wrapper-2">
												<div class="product-img">
													<a href="#">
														<img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" />
													</a>
												</div>	
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
											<div class="product-wrapper-content">
												<div class="product-details">
													
													<h4><a href="product-details?product_id=<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></a></h4>
													<div class="product-price">
														<ul>
															<li>&#2547; <?php echo $row['unit_price']; ?></li>
															<!-- <li class="old-price">$38.00</li> -->
														</ul>
													</div>
													<p><?php echo $row['description']; ?></p>
												</div>
												<div class="product-link">
													<div class="product-button">
														<a class="add_to_cart" id="cart_<?php echo $row['id']; ?>" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
													<div class="add-to-link">
                                                        <ul>
                                                            <li><a href="product-details?product_id=<?php echo $row['id']; ?>" title="Details"><i class="fa fa-external-link"></i></a></li>
                                                        </ul>
                                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- single-shop-end -->
								<?php 
	                            	}
	                            }else{
	                            ?>
	                            <div class="col-lg-12">Data not found</div>
	                            <?php 
	                        	}
	                            ?>
							</div>
						</div>
						<!-- tab-area-end -->
						<!-- pagination-area-start -->
						<!-- <div class="pagination-area mt-50">
							<div class="list-page-2">
								<p>Items 1-9 of 11</p>
							</div>
							<div class="page-number">
								<ul>
									<li><a href="#" class="active">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#" class="angle"><i class="fa fa-angle-right"></i></a></li>
								</ul>
							</div>
						</div> -->
						<!-- pagination-area-end -->
					</div>
				</div>
			</div>
		</div>
		<!-- shop-main-area-end -->
<?php include 'footer.php'; ?>
