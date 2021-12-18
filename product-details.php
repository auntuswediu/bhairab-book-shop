<?php 
	session_start();
	include 'config.php'; 
	$sql = "SELECT * from products where id = '".$_GET['product_id']."' ";
    $query = mysqli_query($con,$sql);
    $num_row = mysqli_num_rows($query);
    
    if ($num_row > 0) {
    	$row = mysqli_fetch_array($query);
    }else{
    	header("Location: index");
    }
 
    if (isset($_POST['review'])) {
    	$sql_review = "INSERT INTO `product_review`(`product_id`, `review`,name) VALUES ('".$_POST['product_id']."','".$_POST['massage']."','".$_POST['name']."')";
    	$query_review = mysqli_query($con,$sql_review);
    	if ($query_review) {
    		$message = '<div class="alert alert-success" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>Thanks for your review</strong>
					</div>';
    	}else{
    		$message = '<div class="alert alert-danger" id="success-alert">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <strong>'.mysqli_error($con).'</strong>
					</div>';
    	}
    }
    // stock check
    $row_soild =  mysqli_fetch_array(mysqli_query($con,"SELECT sum(qty) as qty,product_id from order_products where product_id = '".$row['id']."'"));
    $available = $row['qty']-$row_soild['qty'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Book Shop – Product-details</title>
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
								<li><a href="#" class="active">product-details</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs-area-end -->
		<!-- product-main-area-start -->
		<div class="product-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<!-- product-main-area-start -->
						<div class="product-main-area">
							<div class="row">
								<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
									<div class="flexslider">
										<ul class="slides">
											<li data-thumb="public/images/products/<?php echo $row['img1']; ?>">
											  <img src="public/images/products/<?php echo $row['img1']; ?>" alt="<?php echo $row['name']; ?>" />
											</li>
											<?php if (!empty($row['img2'])): ?>
											<li data-thumb="public/images/products/<?php echo $row['img2']; ?>">
											  <img src="public/images/products/<?php echo $row['img2']; ?>" alt="<?php echo $row['name']; ?>" />
											</li>
											<?php endif ?>
											
											<?php if (!empty($row['img3'])): ?>
											<li data-thumb="public/images/products/<?php echo $row['img3']; ?>">
											  <img src="public/images/products/<?php echo $row['img3']; ?>" alt="<?php echo $row['name']; ?>" />
											</li>
											<?php endif ?>
										</ul>
									</div>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
									<div class="product-info-main">
										<div class="page-title">
											<h1><?php echo $row['product_name']; ?></h1>
										</div>
										<div class="product-info-stock-sku">
											<?php 
											if ($available<=0) {
				                            	// echo '<span><i class="fa fa-check"></i> stock not available</span>';
				                            }else{
				                            	echo '<span><i class="fa fa-check"></i> In stock</span>';
				                            }
											?>
											<!-- <span>In stock</span> -->
											<!-- <div class="product-attribute">
												<span>SKU</span>
												<span class="value">24-WB05</span>
											</div> -->
										</div>
										<!-- <div class="product-reviews-summary">
											<div class="reviews-actions">
												<a href="#">3 Reviews</a>
												<a href="#" class="view" id="review" data-toggle="modal" data-target="#add_data_Modal">Add Your Review</a>
											</div>
										</div> -->
										<div class="product-info-price">
											<div class="price-final">
												<span>&#2547; <?php echo $row['market_price']; ?></span>
												<!-- <span class="old-price">$40.00</span> -->
											</div>
										</div>
										<div class="product-add-form">
											<form >
												<?php if ($available<=0): ?>
												<a><i class="fa fa-times"></i> Stock not available</a>
												<?php else: ?>
												<div class="quality-button">
													<input class="qty" type="number" id="qty" value="1">
												</div>
												<a class="add_cart" id="cart_<?php echo $row['id'] ?>">Add to cart</a>
												<?php endif ?>
											</form>
										</div>
										<!-- <div class="product-social-links">
											<div class="product-addto-links">
												<a href="#"><i class="fa fa-heart"></i></a>
												<a href="#"><i class="fa fa-pie-chart"></i></a>
												<a href="#"><i class="fa fa-envelope-o"></i></a>
											</div>
											<div class="product-addto-links-text">
												<p></p>
											</div>
										</div> -->
									</div>
								</div>
							</div>	
						</div>
						<!-- product-main-area-end -->
						<!-- product-info-area-start -->
						<div class="product-info-area mt-80">
							<?php if(isset($message)){ echo $message; } ?>
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#Details" data-toggle="tab">Details</a></li>
								<li><a href="#Reviews" data-toggle="tab">Reviews <?php 
								$sql_product_review = "SELECT * from product_review where product_id = '".$_GET['product_id']."' ";
							    $query_product_review = mysqli_query($con,$sql_product_review);
							    echo $num_row_product_review = mysqli_num_rows($query_product_review);
								 ?></a></li>
							</ul>
							<div class="tab-content">
                                <div class="tab-pane active" id="Details">
                                    <div class="valu">
                                      <p><?php echo $row['description']; ?></p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Reviews">
                                    <div class="valu valu-2">
                                        <div class="review-add">
                                            <h3>You're reviewing:</h3>

                                        </div>
                                        <form action="" method="post">
	                                        <div class="review-form">
	                                            <div class="single-form">
	                                            	<label>Name <sup>*</sup></label>
	                                            	<input type = "text"  name = "name" placeholder = "name" class="form-control"><br>
	                                                <label>Review <sup>*</sup></label>
	                                            	<input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
	                                                <textarea class="form-control" name="massage" cols="10" rows="4" placeholder="Enter short review"></textarea>
	                                                
	                                            </div>
	                                        </div>
	                                        <div class="review-form-button">
	                                            <button class="btn btn-success" type="submit" name="review">Submit Review</button>
	                                        </div>
                                        </form>
                                        <hr>
                                        <div class="section-title mb-60 mt-60">
                                            <h2>Customer Reviews</h2>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="">
                                                	<?php 
                                                	if ($num_row_product_review > 0) {
												    	while ($row_product_review = mysqli_fetch_array($query_product_review)) {
												    		echo '<div class="review-content">
                                                        <h4>'.$row_product_review['review'].' </h4>
                                                    </div>';
                                                    echo '<div class="review-details">
                                                        <p class="review-date">Posted on <span>'.date('F d, Y', strtotime($row_product_review['created_at'])).'</span></p>
                                                    </div><hr>';
												    	}
												    }
                                                	?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>	
						</div>
						<!-- product-info-area-end -->
						<!-- new-book-area-start -->
						<div class="new-book-area mt-60">
							<div class="section-title text-center mb-30">
								<h3>Recent post</h3>
							</div>
							<div class="tab-active-2 owl-carousel">
								<?php 
                            	$sql_recent = "SELECT * from products where status = 1 order by id desc limit 4";
				                $query_recent = mysqli_query($con,$sql_recent);
				                if (mysqli_num_rows($query_recent) > 0) {
				                	while($row_recent = mysqli_fetch_array($query_recent)) {
                            	?>
								<!-- single-product-start -->
								<div class="product-wrapper">
									<div class="product-img">
	                                    <a href="<?php echo $row_recent['id']; ?>">
	                                        <img src="public/images/products/<?php echo $row_recent['img1']; ?>" alt="book" class="primary" />
	                                    </a>
	                                    <div class="quick-view" id="view_<?php echo $row_recent['id']; ?>">
	                                        <a class="action-view" title="Quick View">
	                                            <i class="fa fa-search-plus"></i>
	                                        </a>
	                                    </div>
	                                    <div class="product-flag">
	                                        <ul>
	                                            <li><span class="sale">new</span></li>
	                                            <!-- <li><span class="discount-percentage">-5%</span></li> -->
	                                        </ul>
	                                    </div>
	                                </div>
                                    <div class="product-details text-center">
	                                    <h4><a href="product-details?product_id=<?php echo $row_recent['id']; ?>"><?php echo $row_recent['product_name']; ?></a></h4>
	                                    <div class="product-price">
	                                        <ul>
	                                            <li>&#2547; <?php echo $row_recent['market_price']; ?></li>
	                                        </ul>
	                                    </div>
	                                </div>
                                    <div class="product-link">
	                                    <div class="product-button">
	                                        <a class="add_to_cart" id="cart_<?php echo $row_recent['id']; ?>" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                                    </div>
	                                    <div class="add-to-link">
	                                        <ul>
	                                            <li><a href="product-details?product_id=<?php echo $row_recent['id']; ?>" title="Details"><i class="fa fa-external-link"></i></a></li>
	                                        </ul>
	                                    </div>
	                                </div> 	
								</div>
								<!-- single-product-end -->
								<?php 
									}
								}
								?>
							</div>
						</div>
						<!-- new-book-area-start -->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="shop-left">
							<div class="left-title mb-20">
								<h4>Related Products</h4>
							</div>
							<div class="random-area mb-30">
								<div class="product-active-2 owl-carousel">
									<div class="product-total-2">
										<?php 
		                            	$sql = "SELECT * from products where category_id = '".$row['category_id']."' order by id desc limit 0,2";
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
														<li>&#2547; <?php echo $row['market_price']; ?></li>
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
		                            	$sql = "SELECT * from products where category_id = '".$row['category_id']."' order by id desc limit 2,2";
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
														<li>&#2547; <?php echo $row['market_price']; ?></li>
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
									<a href="#"><img src="public/frontend/img/banner/33.jpg" alt="banner" /></a>
								</div>
							</div>
							<div class="left-title-2 mb-30">
								<h2>Compare Products</h2>
								<p>You have no items to compare.</p>
							</div>
							<div class="left-title-2">
								<h2>My Wish List</h2>
								<p>You have no items in your wish list.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- product-main-area-end -->
		<!-- model -->
		<div id="add_data_Modal" class="modal fade">  
		  	<div class="modal-dialog">  
		       <div class="modal-content">  
		            <div class="modal-header">  
		                 <button type="button" class="close" data-dismiss="modal">&times;</button>  
		                 <h4 class="modal-title">Add new category</h4>  
		            </div>  
		            <div class="modal-body">  
		                <form method="post" id="insert_form">  
		                    <div class="form-group">
				                <label class="col-form-label">Category name</label>
				                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category name" required autofocus>
				                <span class="messages"></span>
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
				                  <span class="messages"></span>
				            </div>
							<div class="form-group">
				                <label class="col-form-label">URL</label>
				                  <input type="text" class="form-control" id="url" name="url" placeholder="URL" >
				                  <span class="messages"></span>
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
<?php include 'footer.php'; ?>
