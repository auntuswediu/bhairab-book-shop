    <span id="short_product_view"></span>
    <?php 
        $row_store = mysqli_fetch_array(mysqli_query($con,"SELECT * from store_info"));
    ?>
    <!-- footer-area-start -->
    <footer>
    	<!-- footer-top-start -->
    	<!-- <div class="footer-top">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-12">
    					<div class="footer-top-menu bb-2">
    						<nav>
    							<ul>
    								<li><a href="#">home</a></li>
    								<li><a href="#">Enable Cookies</a></li>
    								<li><a href="#">Privacy and Cookie Policy</a></li>
    								<li><a href="#">contact us</a></li>
    								<li><a href="#">blog</a></li>
    							</ul>
    						</nav>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div> -->
    	<!-- footer-top-start -->
    	<!-- footer-mid-start -->
    	<div class="footer-mid ptb-50">
    		<div class="container">
    			<div class="row">
    		        <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="link-follow">
                            <ul>
                                <?php 
                                    $query_social_media = mysqli_query($con,"SELECT * from social_media");
                                    while($row_social_media = mysqli_fetch_array($query_social_media)){
                                ?>
                                <li><a href="<?php if(!empty($row_social_media['url'])){ echo $row_social_media['url']; }else{ echo '#'; } ?>" title="<?php echo $row_social_media['name']; ?>"><?php echo $row_social_media['icon'] ?></a></li>
                                <?php 
                                    }
                                ?>
                            </ul>
                        </div>
    		            <!-- <div class="row">
    		                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>Products</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="about.html">About us</a></li>
                                            <li><a href="#">Prices drop </a></li>
                                            <li><a href="#">New products</a></li>
                                            <li><a href="#">Best sales</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>Our company</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="contact.html">Contact us</a></li>
                                            <li><a href="#">Sitemap</a></li>
                                            <li><a href="#">Stores</a></li>
                                            <li><a href="register.html">My account </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>Your account</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="contact.html">Addresses</a></li>
                                            <li><a href="#">Credit slips </a></li>
                                            <li><a href="#"> Orders</a></li>
                                            <li><a href="#">Personal info</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
    		            </div> -->
    		        </div>
    		        <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="single-footer mrg-sm">
                            <div class="footer-title mb-20">
                                <h3>STORE INFORMATION</h3>
                            </div>
                            <div class="footer-contact">
                                <p class="adress">
                                    <span><?php echo $row_store['company_name']; ?></span>
                                    <?php echo $row_store['address']; ?>
                                </p>
                                <p><span>Call us now:</span> <?php echo $row_store['phone']; ?></p>
                                <p><span>Email:</span>  <?php echo $row_store['email']; ?></p>
                            </div>
                        </div>
    		        </div>
    			</div>
    		</div>
    	</div>
    	<!-- footer-mid-end -->
    	<!-- footer-bottom-start -->
    	<div class="footer-bottom">
    		<div class="container">
    			<div class="row bt-2">
    				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    					<div class="copy-right-area">
    						<p>Copyright ©<a href="#"><?php echo $row_store['company_name']; ?></a>. All Right Reserved.</p>
    					</div>
    				</div>
    				<!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    					<div class="payment-img text-right">
    						<a href="#"><img src="public/frontend/img/1.png" alt="payment" /></a>
    					</div>
    				</div> -->
    			</div>
    		</div>
    	</div>
    	<!-- footer-bottom-end -->
    </footer>
    <!-- footer-area-end -->
        <!-- all js here -->
        <!-- jquery latest version -->
        <script src="public/frontend/js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="public/frontend/js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="public/frontend/js/owl.carousel.min.js"></script>
        <!-- meanmenu js -->
        <script src="public/frontend/js/jquery.meanmenu.js"></script>
        <!-- wow js -->
        <script src="public/frontend/js/wow.min.js"></script>
        <!-- jquery.parallax-1.1.3.js -->
        <script src="public/frontend/js/jquery.parallax-1.1.3.js"></script>
        <!-- jquery.countdown.min.js -->
        <script src="public/frontend/js/jquery.countdown.min.js"></script>
        <!-- jquery.flexslider.js -->
        <script src="public/frontend/js/jquery.flexslider.js"></script>
        <!-- chosen.jquery.min.js -->
        <script src="public/frontend/js/chosen.jquery.min.js"></script>
        <!-- jquery.counterup.min.js -->
        <script src="public/frontend/js/jquery.counterup.min.js"></script>
        <!-- waypoints.min.js -->
        <script src="public/frontend/js/waypoints.min.js"></script>
        <!-- plugins js -->
        <script src="public/frontend/js/plugins.js"></script>
        <!-- main js -->
        <script src="public/frontend/js/main.js"></script>
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
    </body>

</html>
