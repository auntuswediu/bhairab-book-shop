<?php 
include 'config.php';

if (isset($_GET['p_id'])) {
	$sql = "SELECT * from products where id = '".$_GET['p_id']."' ";
    $query = mysqli_query($con,$sql);
    if (mysqli_num_rows($query) > 0) {
    	$row = mysqli_fetch_array($query);
    	$row_soild =  mysqli_fetch_array(mysqli_query($con,"SELECT sum(qty) as qty,product_id from order_products where product_id = '".$row['id']."'"));
    	$available = $row['qty']-$row_soild['qty'];
		echo '
		<!-- Modal -->
		<div class="modal fade" id="productModal">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
		            </div>
		            <div class="modal-body">
		                <div class="row">
		                    <div class="col-md-5 col-sm-5 col-xs-12">
		                        <div class="modal-tab">
		                            <div class="product-details-large tab-content">
		                                <div class="tab-pane active" id="image-1">
		                                    <img src="public/images/products/'.$row['img1'].'" alt="" />
		                                </div>
		                                <div class="tab-pane" id="image-2">
		                                    <img src="public/images/products/'.$row['img2'].'" alt="" />
		                                </div>
		                                <div class="tab-pane" id="image-3">
		                                    <img src="public/images/products/'.$row['img3'].'" alt="" />
		                                </div>
		                            </div>
		                            <div class="product-details-small quickview-active owl-carousel">
		                                <a class="active" href="#image-1"><img src="public/images/products/'.$row['img1'].'" alt="" /></a>
		                                <a href="#image-2"><img src="public/images/products/'.$row['img2'].'" alt="" /></a>
		                                <a href="#image-3"><img src="public/images/products/'.$row['img3'].'" alt="" /></a>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-7 col-sm-7 col-xs-12">
		                        <div class="modal-pro-content">
		                            <h3>'.$row['product_name'].'</h3>
		                            <div class="price">
		                                <span>BDT '.$row['unit_price'].'</span>
		                            </div>
		                            <p>'.$row['description'].'</p>    
		                            <div class="quick-view-select">
		                                <div class="select-option-part">
		                                    <label>Available*</label>
		                                    <input disabled="disabled" type="number" value="'.$available.'"/>
		                                </div>
		                            </div>';
		                            
		                            if ($available<=0) {
		                            	echo '<span><i class="fa fa-times"></i> Stock not available</span>';
		                            }else{
		                            	echo '
		                            	<div class="form" >
			                                <input type="number" value="1" id="qty" />
			                                <button class="add_cart btn btn-success btn-lg bt-flat" id="cart_'.$row['id'].'"><i class="fa fa-shopping-cart"></i>Add to cart</button>
			                            </div>
		                            	<span><i class="fa fa-check"></i> In stock</span>';
		                            }
		                            echo '
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Modal end -->
		';
	}
}

?>