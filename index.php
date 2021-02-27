<?php 
	session_start();
	include 'config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>Book Shop – Home</title>
    <?php include 'css.php'; ?>
</head>
    <body class="home-4">

    	<?php include 'header.php'; ?>
		<!-- slider-group-start -->
		<div class="slider-group  mt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		                <!-- slider-area-start -->
		                <div class="slider-area">
		                    <div class="slider-active owl-carousel">
		                        <div class="single-slider slider-hm4-1 pt-154 pb-154 bg-img" style="background-image:url(public/frontend/img/slider/7.jpg);">
		                            <div class="slider-content-4 slider-animated-1 pl-40">
		                                <h1>Sale up to 30% off</h1>
		                                <h2>Books in Store</h2>
		                                <a href="#">Shopping now!</a>
		                            </div>
		                        </div>
		                        <div class="single-slider pt-154 pb-154 bg-img" style="background-image:url(public/frontend/img/slider/8.jpg);">
		                            <div class="slider-content-4 slider-animated-1 pl-40">
		                                <h1>Sale up to 30% off</h1>
		                                <h2>Books in Order</h2>
		                                <a href="#">Shopping now!</a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <!-- slider-area-end -->
		            </div>
		            <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
		                <!-- banner-static-2-start -->
		                <div class="banner-static-2">
		                    <div class="banner-img-2">
		                        <a href="#"><img src="public/frontend/img/banner/20.jpg" alt="banner" /></a>
		                    </div>
		                    <!-- banner-area-3-start -->
		                    <div class="banner-area-3">
		                        <!-- single-banner-2-start -->
		                        <div class="single-banner-2 mt-16">
		                            <div class="single-icon-2">
		                                <a href="#">
		                                    <img class="service-blue-img" src="public/frontend/img/icon-img/service-1.png" alt="banner" />
		                                    <img class="service-white-img" src="public/frontend/img/icon-img/service-1-white.png" alt="banner" />
		                                </a>
		                            </div>
		                            <div class="single-text-2">
		                                <h2>Free shipping item</h2>
		                                <p>For all orders over &#2547; 60</p>
		                            </div>
		                        </div>
		                        <!-- single-banner-2-end -->
		                        <!-- single-banner-2-start -->
		                        <div class="single-banner-2 mt-16">
		                            <div class="single-icon-2">
		                                <a href="#">
		                                    <img class="service-blue-img" src="public/frontend/img/icon-img/service-2.png" alt="banner" />
		                                    <img class="service-white-img" src="public/frontend/img/icon-img/service-2-white.png" alt="banner" />
		                                </a>
		                            </div>
		                            <div class="single-text-2">
		                                <h2>Money back guarante</h2>
		                                <p>100% money back guarante</p>
		                            </div>
		                        </div>
		                        <!-- single-banner-2-end -->
		                        <!-- single-banner-2-start -->
		                        <div class="single-banner-2 mt-16">
		                            <div class="single-icon-2">
		                                <a href="#">
		                                    <img class="service-blue-img" src="public/frontend/img/icon-img/service-3.png" alt="banner" />
		                                    <img class="service-white-img" src="public/frontend/img/icon-img/service-3-white.png" alt="banner" />
		                                </a>
		                            </div>
		                            <div class="single-text-2">
		                                <h2>Cash on delivery</h2>
		                                <p>Lorem ipsum dolor amet</p>
		                            </div>
		                        </div>
		                        <!-- single-banner-2-end -->
		                    </div>
		                    <!-- banner-area-3-end -->
		                </div>
		                <!-- banner-static-2-end -->
		            </div>
		        </div>
		    </div>
		</div>
		<!-- slider-group-end -->
		<!-- home-main-area-start -->
		<div class="home-main-area mt-30">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
		                <!-- category-area-start -->
		                <div class="category-area mb-30">
		                    <h3><a href="#">Category Menu <i class="fa fa-bars"></i></a></h3>
		                    <div class="category-menu">
		                        <nav class="menu">
		                            <ul>
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
		                                <li class="cr-dropdown"><a href="products?category_id=<?php echo $row_category['id']; ?>"><?php echo $row_category['name']; if($num_rows_sub_categories > 0){echo '<i class="none-lg fa fa-angle-down"></i><i class="none-sm fa fa-angle-right"></i>';} ?></a>
		                                    <div class="left-menu">
		                                    	<?php 
												while($row_sub_category = mysqli_fetch_array($query_sub_categories)) {
												?>
		                                        <span class="">
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

		                                 ?>
		                                <!-- <li class="cr-dropdown"><a href="#">Audio books<i class="none-lg fa fa-angle-down"></i><i class="none-sm fa fa-angle-right"></i></a>
		                                    <div class="left-menu">
		                                        <span class="mb-30">
		                                            <a href="#" class="title">Shirts</a>
		                                            <a href="#">Tops & Tees</a>
		                                            <a href="#">Sweaters</a>
		                                            <a href="#">Hoodies</a>
		                                            <a href="#">Jackets & Coats</a>
		                                        </span>
		                                        <span class="mb-30">
		                                            <a href="#" class="title">Jackets</a>
		                                            <a href="#">Sweaters</a>
		                                            <a href="#">Hoodies</a>
		                                            <a href="#">Wedges</a>
		                                            <a href="#">Vests</a>
		                                        </span>
		                                        <span>
		                                            <a href="#" class="title">Tops & Tees</a>
		                                            <a href="#">Long Sleeve </a>
		                                            <a href="#">Short Sleeve</a>
		                                            <a href="#">Polo Short Sleeve</a>
		                                            <a href="#">Sleeveless</a>
		                                        </span>
		                                        <span>
		                                            <a href="#" class="title">Jeans pants</a>
		                                            <a href="#">Polo Short Sleeve</a>
		                                            <a href="#">Sleeveless</a>
		                                            <a href="#">Graphic T-Shirts</a>
		                                            <a href="#">Hoodies</a>
		                                        </span>
		                                    </div>
		                                    <ul>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">Jackets <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="shop-grid-2-col">Tops & Tees</a></li>
		                                                <li><a href="shop-grid-3-col">Polo Short Sleeve</a></li>
		                                                <li><a href="shop">Graphic T-Shirts</a></li>
		                                                <li><a href="shop-grid-6-col">Jackets & Coats</a></li>
		                                                <li><a href="shop-grid-box">Fashion Jackets</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">Bottoms <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="shop-list">Heeled sandals</a></li>
		                                                <li><a href="shop-list">Polo Short Sleeve</a></li>
		                                                <li><a href="shop-list-2-col">Flat sandals</a></li>
		                                                <li><a href="shop-list-3-col">Short Sleeve</a></li>
		                                                <li><a href="shop-list-box">Long Sleeve</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">weaters <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="product-details">Sleeveless</a></li>
		                                                <li><a href="product-details-sticky">Stripes</a></li>
		                                                <li><a href="product-details-gallery">Sweaters</a></li>
		                                                <li><a href="product-details-fixed-img">hoodies</a></li>
		                                                <li><a href="product-details-fixed-img">Crochet</a></li>
		                                                <li><a href="product-details-fixed-img">weaters</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">Jeans Pants <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="shop">Sleeveless</a></li>
		                                                <li><a href="shop">Graphic T-Shirts</a></li>
		                                                <li><a href="shop">Hoodies</a></li>
		                                                <li><a href="shop">Jackets</a></li>
		                                                <li><a href="shop">Polo Short Sleeve</a></li>
		                                                <li><a href="shop">Jeans Pants</a></li>
		                                            </ul>
		                                        </li>
		                                    </ul>
		                                </li>
		                                <li class="cr-dropdown"><a href="#">children’s books<i class="none-lg fa fa-angle-down"></i><i class="none-sm fa fa-angle-right"></i></a>
		                                    <div class="left-menu">
		                                        <span class="mb-30">
		                                            <a href="#" class="title">Tops</a>
		                                            <a href="#">Shirts</a>
		                                            <a href="#">Florals</a>
		                                            <a href="#">Crochet</a>
		                                            <a href="#">Stripes</a>
		                                        </span>
		                                        <span class="mb-30">
		                                            <a href="#" class="title">Bottoms</a>
		                                            <a href="#">Shoes</a>
		                                            <a href="#">Heeled sandals</a>
		                                            <a href="#">Flat sandals</a>
		                                            <a href="#">Wedges</a>
		                                        </span>
		                                        <span>
		                                            <a href="#" class="title">Shorts</a>
		                                            <a href="#">Dresses</a>
		                                            <a href="#">Trousers</a>
		                                            <a href="#">Jeans</a>
		                                        </span>
		                                    </div>
		                                    <ul>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">Jackets <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="shop-grid-2-col">Tops & Tees</a></li>
		                                                <li><a href="shop-grid-3-col">Polo Short Sleeve</a></li>
		                                                <li><a href="shop">Graphic T-Shirts</a></li>
		                                                <li><a href="shop-grid-6-col">Jackets & Coats</a></li>
		                                                <li><a href="shop-grid-box">Fashion Jackets</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">Bottoms <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="shop-list">Heeled sandals</a></li>
		                                                <li><a href="shop-list">Polo Short Sleeve</a></li>
		                                                <li><a href="shop-list-2-col">Flat sandals</a></li>
		                                                <li><a href="shop-list-3-col">Short Sleeve</a></li>
		                                                <li><a href="shop-list-box">Long Sleeve</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">weaters <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="product-details">Sleeveless</a></li>
		                                                <li><a href="product-details-sticky">Stripes</a></li>
		                                                <li><a href="product-details-gallery">Sweaters</a></li>
		                                                <li><a href="product-details-fixed-img">hoodies</a></li>
		                                                <li><a href="product-details-fixed-img">Crochet</a></li>
		                                                <li><a href="product-details-fixed-img">weaters</a></li>
		                                            </ul>
		                                        </li>
		                                    </ul>
		                                </li>
		                                <li class="cr-dropdown"><a href="#">bussiness & money<i class="none-lg fa fa-angle-down"></i><i class="none-sm fa fa-angle-right"></i></a>
		                                    <div class="left-menu">
		                                        <span>
		                                            <a href="#" class="title">Rings</a>
		                                            <a href="#">Coats & Jackets</a>
		                                            <a href="#">Blazers</a>
		                                            <a href="#">Jackets</a>
		                                            <a href="#">Raincoats</a>
		                                            <a href="#">Trousers</a>
		                                        </span>
		                                        <span>
		                                            <a href="#" class="title">Trousers</a>
		                                            <a href="#">Joggers</a>
		                                            <a href="#">Casual</a>
		                                            <a href="#">Chinos</a>
		                                            <a href="#">Tailored</a>
		                                            <a href="#">Jeans</a>
		                                        </span>
		                                    </div>
		                                    <ul>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">Jackets <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="shop-grid-2-col">Tops & Tees</a></li>
		                                                <li><a href="shop-grid-3-col">Polo Short Sleeve</a></li>
		                                                <li><a href="shop">Graphic T-Shirts</a></li>
		                                                <li><a href="shop-grid-6-col">Jackets & Coats</a></li>
		                                                <li><a href="shop-grid-box">Fashion Jackets</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cr-sub-dropdown sub-style"><a href="#">Bottoms <i class="fa fa-angle-down"></i></a>
		                                            <ul>
		                                                <li><a href="shop-list">Heeled sandals</a></li>
		                                                <li><a href="shop-list">Polo Short Sleeve</a></li>
		                                                <li><a href="shop-list-2-col">Flat sandals</a></li>
		                                                <li><a href="shop-list-3-col">Short Sleeve</a></li>
		                                                <li><a href="shop-list-box">Long Sleeve</a></li>
		                                            </ul>
		                                        </li>
		                                    </ul>
		                                </li>
		                                <li><a href="#">usedbooks</a></li>
		                                <li><a href="#">sales off</a></li>
		                                <li><a href="#">Biographies</a></li>
		                                <li><a href="#">Cookbooks</a></li>
		                                <li><a href="#">Education</a></li>
		                                <li><a href="#">Engineering</a></li>
		                                <li class="rx-child"><a href="shop">Health, Fitness</a></li>
		                                <li class="rx-parent">
		                                    <a class="rx-default">
		                                        <span class="cat-thumb fa fa-plus"></span>
		                                        More categories
		                                    </a>
		                                    <a class="rx-show">
		                                        <span class="cat-thumb fa fa-minus"></span>
		                                        close menu
		                                    </a>
		                                </li> -->
		                            </ul>
		                        </nav>
		                    </div>
		                </div>
		                <!-- category-area-end -->
		                <!-- banner-area-start -->
		                <div class="banner-area mb-30">
		                    <div class="banner-img-2">
		                        <a href="#"><img src="public/frontend/img/banner/21.jpg" alt="banner" /></a>
		                    </div>
		                </div>
		                <!-- banner-area-end -->
		                <!-- most-product-area-start -->
		                <div class="most-product-area mb-30">
		                    <div class="section-title-2 mb-30">
		                        <h3>Trending Products </h3>
		                    </div>
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
		                <!-- most-product-area-end -->
		                <!-- recent-post-area-start -->
		                <!-- <div class="recent-post-area mb-30">
		                    <div class="section-title-2 mb-30">
		                        <h3>Recent Posts </h3>
		                    </div>  
		                    <div class="post-active-2 owl-carousel">
		                        <div class="single-post">
		                            <div class="post-img">
		                                <a href="#"><img src="public/frontend/img/post/1.jpg" alt="post" /></a>
		                                <div class="blog-date-time">
		                                    <span class="day-time">06</span>
		                                    <span class="moth-time">Dec</span>
		                                </div>
		                            </div>
		                            <div class="post-content">
		                                <h3><a href="#">The History and the Hype</a></h3>
		                                <span class="meta-author"> Demo Posthemes </span>
		                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
		                            </div>
		                        </div>
		                        <div class="single-post">
		                            <div class="post-img">
		                                <a href="#"><img src="public/frontend/img/post/2.jpg" alt="post" /></a>
		                                <div class="blog-date-time">
		                                    <span class="day-time">07</span>
		                                    <span class="moth-time">Dec</span>
		                                </div>
		                            </div>
		                            <div class="post-content">
		                                <h3><a href="#">Answers to your Questions</a></h3>
		                                <span class="meta-author"> Demo Posthemes </span>
		                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
		                            </div>
		                        </div>
		                        <div class="single-post">
		                            <div class="post-img">
		                                <a href="#"><img src="public/frontend/img/post/3.jpg" alt="post" /></a>
		                                <div class="blog-date-time">
		                                    <span class="day-time">08</span>
		                                    <span class="moth-time">Dec</span>
		                                </div>
		                            </div>
		                            <div class="post-content">
		                                <h3><a href="#">What is Bootstrap?</a></h3>
		                                <span class="meta-author"> Demo Posthemes </span>
		                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
		                            </div>
		                        </div>
		                        <div class="single-post">
		                            <div class="post-img">
		                                <a href="#"><img src="public/frontend/img/post/4.jpg" alt="post" /></a>
		                                <div class="blog-date-time">
		                                    <span class="day-time">09</span>
		                                    <span class="moth-time">Dec</span>
		                                </div>
		                            </div>
		                            <div class="post-content">
		                                <h3><a href="#">Etiam eros massa</a></h3>
		                                <span class="meta-author"> Demo Posthemes </span>
		                                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
		                            </div>
		                        </div>
		                    </div>
		                </div> -->
		                <!-- recent-post-area-end -->
		                <!-- block-newsletter-area-start -->
		                <div class="block-newsletter">
		                    <h2>Sign up for send newsletter</h2>
		                    <p>You can be always up to date with our company new!</p>
		                    <form action="#">
		                        <input type="text" placeholder="Enter your email address" />
		                    </form>
		                    <a href="#">Send Email</a>
		                </div>
		                <!-- block-newsletter-area-end -->
		            </div>
		            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
		                <!-- banner-area-5-start -->
		                <div class="banner-area-5">
		                    <div class="single-banner-4 xs-mb">
		                        <div class="banner-img-2">
		                            <a href="#"><img src="public/frontend/img/banner/24.jpg" alt="banner" /></a>
		                        </div>
		                    </div>
		                    <div class="single-banner-5">
		                        <div class="banner-img-2">
		                            <a href="#"><img src="public/frontend/img/banner/23.jpg" alt="banner" /></a>
		                        </div>
		                    </div>
		                </div>
		                <!-- banner-area-5-end -->
		                <!-- new-book-area-start -->
		                <div class="new-book-area ptb-50">
		                    <div class="section-title-2 mb-30">
		                        <h3>New Arrivals</h3>
		                    </div>
		                    <div class="tab-active-3 owl-carousel">
		                        <div class="tab-total">
		                            <?php 
		                            	$sql = "SELECT * from products where status = 1 order by id desc limit 0,2";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            ?>
		                            <!-- single-product-start -->
		                            <div class="product-wrapper <?php  if($row['id'] % 2 == 0){ echo "mb-40"; } ?>">
		                                <div class="product-img">
		                                    <a href="<?php echo $row['id']; ?>">
		                                        <img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" />
		                                    </a>
		                                    <div class="quick-view" id="view_<?php echo $row['id']; ?>">
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
		                            <?php 
			                            	}
			                            }
		                             ?>
		                            
		                        </div>
		                        <div class="tab-total"> 
		                        	<?php 
		                            	$sql = "SELECT * from products where status = 1 order by id desc limit 2,2";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            ?>
		                             <!-- single-product-start -->
		                            <div class="product-wrapper <?php  if($row['id'] % 2 == 0){ echo "mb-40"; } ?>">
		                                <div class="product-img">
		                                    <a href="<?php echo $row['id']; ?>">
		                                        <img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" />
		                                    </a>
		                                    <div class="quick-view" id="view_<?php echo $row['id']; ?>">
		                                        <a class="action-view" title="Quick View">
		                                            <i class="fa fa-search-plus"></i>
		                                        </a>
		                                    </div>
		                                    <div class="product-flag">
		                                        <ul>
		                                            <li><span class="sale">new</span></li>
		                                            <li><span class="discount-percentage">-5%</span></li>
		                                        </ul>
		                                    </div>
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
		                            <?php 
			                            	}
			                            }
		                             ?>
		                        </div>
		                        <div class="tab-total"> 
		                        	<?php 
		                            	$sql = "SELECT * from products where status = 1 order by id desc limit 4,2";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            ?>
		                             <!-- single-product-start -->
		                            <div class="product-wrapper <?php  if($row['id'] % 2 == 0){ echo "mb-40"; } ?>">
		                                <div class="product-img">
		                                    <a href="<?php echo $row['id']; ?>">
		                                        <img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" />
		                                    </a>
		                                    <div class="quick-view" id="view_<?php echo $row['id']; ?>">
		                                        <a class="action-view" title="Quick View">
		                                            <i class="fa fa-search-plus"></i>
		                                        </a>
		                                    </div>
		                                    <div class="product-flag">
		                                        <ul>
		                                            <li><span class="sale">new</span></li>
		                                            <li><span class="discount-percentage">-5%</span></li>
		                                        </ul>
		                                    </div>
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
		                            <?php 
			                            	}
			                            }
		                             ?>
		                        </div>
		                        <div class="tab-total"> 
		                        	<?php 
		                            	$sql = "SELECT * from products where status = 1 order by id desc limit 6,2";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            ?>
		                             <!-- single-product-start -->
		                            <div class="product-wrapper <?php  if($row['id'] % 2 == 0){ echo "mb-40"; } ?>">
		                                <div class="product-img">
		                                    <a href="<?php echo $row['id']; ?>">
		                                        <img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" />
		                                    </a>
		                                    <div class="quick-view" id="view_<?php echo $row['id']; ?>">
		                                        <a class="action-view" title="Quick View">
		                                            <i class="fa fa-search-plus"></i>
		                                        </a>
		                                    </div>
		                                    <div class="product-flag">
		                                        <ul>
		                                            <li><span class="sale">new</span></li>
		                                            <li><span class="discount-percentage">-5%</span></li>
		                                        </ul>
		                                    </div>
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
		                            <?php 
			                            	}
			                            }
		                             ?>
		                        </div>
		                        <div class="tab-total"> 
		                        	<?php 
		                            	$sql = "SELECT * from products where status = 1 order by id desc limit 8,2";
						                $query = mysqli_query($con,$sql);
						                if (mysqli_num_rows($query) > 0) {
						                	while($row = mysqli_fetch_array($query)) {
		                            ?>
		                             <!-- single-product-start -->
		                            <div class="product-wrapper <?php  if($row['id'] % 2 == 0){ echo "mb-40"; } ?>">
		                                <div class="product-img">
		                                    <a href="<?php echo $row['id']; ?>">
		                                        <img src="public/images/products/<?php echo $row['img1']; ?>" alt="book" class="primary" />
		                                    </a>
		                                    <div class="quick-view" id="view_<?php echo $row['id']; ?>">
		                                        <a class="action-view" title="Quick View">
		                                            <i class="fa fa-search-plus"></i>
		                                        </a>
		                                    </div>
		                                    <div class="product-flag">
		                                        <ul>
		                                            <li><span class="sale">new</span></li>
		                                            <li><span class="discount-percentage">-5%</span></li>
		                                        </ul>
		                                    </div>
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
		                            <?php 
			                            	}
			                            }
		                             ?>
		                        </div>
		                    </div>
		                </div>
		                <!-- new-book-area-start -->
		                <!-- hot-sell-area-2-start -->
		                
		                <!-- hot-sell-area-2-end -->
		                <!-- product-area-start -->
		                <!-- <div class="product-area">
		                    <div class="row">
		                        <div class="col-md-4 col-sm-12 xs-mb">
		                            <div class="section-title-2 mb-30">
		                                <h3>Book</h3>
		                            </div>
		                            <div class="product-active-3 owl-carousel">
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/20.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Endeavor Daytrip</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/21.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Savvy Shoulder Tote</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$35.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/22.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Compete Track Tote</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$35.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/23.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Voyage Yoga Bag</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/24.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Impulse Duffle</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$70.00</li>
		                                                    <li class="old-price">$74.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/22.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Fusion Backpack</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$59.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>  
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/23.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Voyage Yoga Bag</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/24.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Impulse Duffle</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$70.00</li>
		                                                    <li class="old-price">$74.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/22.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Fusion Backpack</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$59.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>  
		                            </div>
		                        </div>
		                        <div class="col-md-4 col-sm-12 xs-mb">
		                            <div class="section-title-2 mb-30 mrg-sm">
		                                <h3>Audio books </h3>
		                            </div>
		                            <div class="product-active-3 owl-carousel">
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/23.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Voyage Yoga Bag</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/24.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Impulse Duffle</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$70.00</li>
		                                                    <li class="old-price">$74.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/26.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Driven Backpack1</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$40.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/20.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Endeavor Daytrip</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/21.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Savvy Shoulder Tote</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$35.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/22.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Compete Track Tote</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$35.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>  
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/20.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Endeavor Daytrip</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/21.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Savvy Shoulder Tote</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$35.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/22.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Compete Track Tote</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$35.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>  
		                            </div>
		                        </div>
		                        <div class="col-md-4 col-sm-12">
		                            <div class="section-title-2 mb-30 mrg-sm">
		                                <h3>chilren’s books</h3>
		                            </div>
		                            <div class="product-active-3 owl-carousel">
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/27.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Crown Summit</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$36.00</li>
		                                                    <li class="old-price">$38.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/28.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Driven Backpack</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$34.00</li>
		                                                    <li class="old-price">$36.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/29.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Endeavor Daytrip</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/23.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Voyage Yoga Bag</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/24.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Impulse Duffle</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$70.00</li>
		                                                    <li class="old-price">$74.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/22.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Fusion Backpack</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$59.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>  
		                                <div class="product-total-2">
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/23.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Voyage Yoga Bag</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$30.00</li>
		                                                    <li class="old-price">$33.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product bd mb-18">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/24.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Impulse Duffle</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$70.00</li>
		                                                    <li class="old-price">$74.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="single-most-product">
		                                        <div class="most-product-img">
		                                            <a href="#"><img src="public/frontend/img/product/22.jpg" alt="book" /></a>
		                                        </div>
		                                        <div class="most-product-content">
		                                            <div class="product-rating">
		                                                <ul>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
		                                                </ul>
		                                            </div>
		                                            <h4><a href="#">Fusion Backpack</a></h4>
		                                            <div class="product-price">
		                                                <ul>
		                                                    <li>$59.00</li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>  
		                            </div>
		                        </div>
		                    </div>
		                </div>   -->
		                <!-- product-area-end -->
		            </div>
		        </div>
		    </div>
		</div>
		<!-- home-main-area-end -->
		<!-- banner-area-start -->
		<div class="banner-area-5 mtb-70">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="banner-img-2 for-height">
		                    <a href="#"><img src="public/frontend/img/banner/5.jpg" alt="banner" /></a>
		                    <div class="banner-text">
		                        <h3>G. Meyer Books & Spiritual Traveler Press</h3>
		                        <h2>Sale up to 30% off</h2>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- banner-area-end -->
		<!-- social-group-area-start -->
		<!-- <div class="social-group-area ptb-60">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                <div class="section-title-3">
		                    <h3>Latest Tweets</h3>
		                </div>
		                <div class="twitter-content">
		                    <div class="twitter-icon">
		                        <a href="#"><i class="fa fa-twitter"></i></a>
		                    </div>
		                    <div class="twitter-text">
		                        <p>
		                            Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum notare quam 
		                        </p>
		                        <a href="#">posthemes</a>
		                    </div>
		                </div>
		            </div>
		            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                <div class="section-title-3">
		                    <h3>Stay Connected</h3>
		                </div>
		                <div class="link-follow">
		                    <ul>
		                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
		                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
		                        <li class="hidden-sm"><a href="#"><i class="fa fa-vimeo"></i></a></li>
		                        <li class="hidden-sm"><a href="#"><i class="fa fa-instagram"></i></a></li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div> -->
		<!-- social-group-area-end -->
<?php include 'footer.php'; ?>
