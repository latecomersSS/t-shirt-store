<?php
if(isset($_GET['act']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $rsproduct = products::getByID($id); 
    $rowpro = $rsproduct->fetch_array();
	$cateName = categories::getNameById($rowpro[2]);
	$price = number_format($rowpro[4], 0);
}
?>

		<!--- start-content---->
		<div class="content details-page mt-2">
			<!---start-product-details--->
			<div class="product-details">
				<div class="wrap">
					<ul class="product-head">
						<li><a href="">Home</a> &emsp;</li>
						<li class="active-page"><a href="index.php?act=product">Product Page</a></li>
						<div class="clear"> </div>
					</ul>
				<!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="css/etalage.css">
					<script src="js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								source_image_width: 900,
								source_image_height: 1000,
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->
				<form action="" method="POST" enctype="multipart/form-data" name="addDetail" onsubmit="return addDetailForm()">
				<input type="hidden" value="<?php echo $id;?>" name="pro_id">
				<input type="hidden" value="<?php echo $rowpro[4];?>" name="price">
				<input type="hidden" value="" name="address">
				<input type="hidden" value="" name="note">
				<div class="details-left">
					<div class="details-left-slider">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php print $rowpro[6]?>" />
									<img class="etalage_source_image" src="<?php print $rowpro[6]?>" />
								</a>
							</li>
						</ul>
					</div>
					<div class="details-left-info">
						<div class="details-right-head">
						<h1><?php echo $rowpro[1];?></h1>
						<!--<ul class="pro-rate">
							<li><a class="product-rate" href="#"> <label> </label></a> <span> </span></li>
							<li><a href="#">0 Review(s) Add Review</a></li>
						</ul>
						<p class="product-detail-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
						<a class="learn-more" href="#"><h3>MORE DETAILS</h3></a> -->
						<ul><h2><?php echo $cateName; ?></h2><br></ul>
						<div class="product-more-details">
							<ul class="price-avl">
								<li class="price"><label><?php echo $price ?> VNĐ</label></li>
								<div class="clear"> </div>
							</ul>
							<ul class="product-colors">
								<h3>available Colors ::</h3>
								<li><a class="color1" href="#"><span> </span></a></li>
								<li><a class="color2" href="#"><span> </span></a></li>
								<li><a class="color3" href="#"><span> </span></a></li>
								<li><a class="color4" href="#"><span> </span></a></li>
								<li><a class="color5" href="#"><span> </span></a></li>
								<li><a class="color6" href="#"><span> </span></a></li>
								<li><a class="color7" href="#"><span> </span></a></li>
								<li><a class="color8" href="#"><span> </span></a></li>
								<div class="clear"> </div>
							</ul>
							<ul class="prosuct-qty">
								<label for="quantity"><span>Quantity: </span></label>
								<input type="number" id="quantity" name="quantity" value="1" min="0" max="<?php echo $rowpro[5];?>">
							</ul>
							<button type="submit" name="submit" class="btn btn-primary">Add to cart</button>
							<ul class="product-share">
								<h3>All so Share On</h3>
								<ul>
									<li><a class="share-face" href="#"><span> </span> </a></li>
									<li><a class="share-twitter" href="#"><span> </span> </a></li>
									<li><a class="share-google" href="#"><span> </span> </a></li>
									<li><a class="share-rss" href="#"><span> </span> </a></li>
									<div class="clear"> </div>
								</ul>
							</ul>
						</div>
					</div>
					</div>
					<div class="clear"> </div>
				</div>
				</form>
				<div class="clear"> </div>
			</div>
			<!----product-rewies---->
			<div class="product-reviwes">
				<div class="wrap">
				<!--vertical Tabs-script-->
				<!---responsive-tabs---->
					<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							 $('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true,   // 100% fit in a container
									closed: 'accordion', // Start closed if in accordion view
									activate: function(event) { // Callback function if tab is switched
									var $tab = $(this);
									var $info = $('#tabInfo');
									var $name = $('span', $info);
										$name.text($tab.text());
										$info.show();
									}
								});
													
							 $('#verticalTab').easyResponsiveTabs({
									type: 'vertical',
									width: 'auto',
									fit: true
								 });
						 });
					</script>
				<!---//responsive-tabs---->
				<!--//vertical Tabs-script-->
				<!--vertical Tabs-->
        		<div id="verticalTab">
		            <ul class="resp-tabs-list">
		                <li>Description</li>
		                <li>Product tags</li>
		                <li>Product reviews</li>
		            </ul>
		            <div class="resp-tabs-container vertical-tabs">
		                <div>
		                	<h3> Details</h3>
		                    <p><?php echo $rowpro[7];?></p>
		                </div>
		                <div>
		                	<h3>Product Tags</h3>
		                	<h4>Add Your Tags:</h4>
		                	<form>
		                		<input type="text"> <input type="submit" value="ADD TAGS"/>
		                		<span>Use spaces to separate tags. Use single quotes (') for phrases.</span>
		                	</form>
		                </div>
		                <div>
		                	<h3>Customer Reviews</h3>
		                	<p>There are no customer reviews yet.</p>
		                </div>
		            </div>
       		</div>
       		<div class="clear"> </div>
       		<!--- start-similar-products--->
       		<div class="similar-products">
       			<div class="similar-products-left">
       				<h3>SIMILAR PRODUCTS</h3>
       				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
       			</div>
       			<div class="similar-products-right">
       				<!-- start content_slider -->
       				<!--- start-rate---->
							<script src="js/jstarbox.js"></script>
							<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
							<script type="text/javascript">
								jQuery(function() {
									jQuery('.starbox').each(function() {
										var starbox = jQuery(this);
										starbox.starbox({
											average: starbox.attr('data-start-value'),
											changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
											ghosting: starbox.hasClass('ghosting'),
											autoUpdateAverage: starbox.hasClass('autoupdate'),
											buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
											stars: starbox.attr('data-star-count') || 5
										}).bind('starbox-value-changed', function(event, value) {
											if(starbox.hasClass('random')) {
												var val = Math.random();
												starbox.next().text(' '+val);
												return val;
											} 
										})
									});
								});
							</script>
							<!---//End-rate---->
					       <div id="owl-demo" class="owl-carousel">
				                
				                <?php
							$cond = 'quantity';
							$tsproduct = products::getTop($cond, 5);
							while($tsrow = $tsproduct->fetch_array()){
								$id = $tsrow[0];
								$cateName = categories::getNameById($tsrow[2]);
								echo "<div class='item'>
										<div class='product-grid fade sproduct-grid'>
											<div class='product-pic'>
												<a href='#'><img src='$tsrow[6]' title='$tsrow[1]' height='280px' width='90%'></a>
												<p>
												<a href='#'><small></small> $tsrow[1] <small></small> FG</a>
												<span>$cateName</span>
												</p>
											</div>
											<div class='product-info'>
												<div class='product-info-cust'>
													<a href='index.php?act=detail&id=$tsrow[0]'>Details</a>
												</div>
												<div class='product-info-price'>
													<a href='index.php?act=detail&id=$tsrow[0]'>$tsrow[4] VND</a>
												</div>
												<div class='clear'> </div>
											</div>
											<div class='more-product-info'>
												<span> </span>
											</div>
										</div>
									</div>";
								}
							?>
			            </div>
				<!----//End-img-cursual---->
       			</div>
       			<div class="clear"> </div>
       		</div>
       		<!--- //End-similar-products--->
			</div>
			</div>
			<div class="clear"> </div>
			<!--//vertical Tabs-->
			<!----//product-rewies---->
			<!---//End-product-details--->
			</div>
		</div>
		<!---- start-bottom-grids---->



<?php
	error_reporting(0);
    if(isset($_POST["submit"]) && isset($_POST["pro_id"]) && isset($_POST["quantity"]) && isset($_POST["price"])
	&& isset($_POST["address"]) && isset($_POST["note"])) {
        $pro_id = $_POST["pro_id"];
		$quantity = $_POST["quantity"];
		$price = $_POST["price"];  
		$address = $_POST["address"];   
		$note = $_POST["note"];  
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
		if(!$_SESSION["id"]){
			echo "<script type='text/javascript'>alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');</script>";
		}
		$cus_id = $_SESSION["id"];
		if(!$_SESSION['order_id']){
			$neworder = new orders();
			$neworder->set(NULL, NULL, $cus_id, $address, NULL, 0, NULL, $updated_at, $created_at, $note, NULL, NULL);
			$rsneworder = orders::add($neworder);
			if($rsneworder == 1){
				$order_id = orders::getIdOrderNew($_SESSION["id"]);
				session_start();
				$_SESSION["order_id"] = $order_id;
				$orderdetail = new order_details();
				$orderdetail->set($order_id, $pro_id, $quantity, $created_at, $updated_at, 1);
				$rsdetail = order_details::add($orderdetail);
				if($rsdetail == 1){
					echo "<script type='text/javascript'>alert('Sản phẩm đã được thêm vào giỏ hàng.');</script>";
				}else{
					echo "<script type='text/javascript'>alert('Thêm chi tiết đơn hàng không thành công.');</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('Thêm sản phẩm vào giỏ hàng không thành công.');</script>";
			}
		} else {
			$order_id = $_SESSION["order_id"];
			$existdt = order_details::getDetailExist($order_id, $pro_id);
			if($existdt == 1){
				$addquantity = order_details::addQuantityDetail($order_id, $quantity, $pro_id);
				if($addquantity == 1){
					echo "<script type='text/javascript'>alert('Sản phẩm đã được thêm số lương vào giỏ hàng.');</script>";
				}else{
					echo "<script type='text/javascript'>alert('Thêm số lượng không thành công.');</script>";
				}
			}else{
				$orderdetail = new order_details();
				$orderdetail->set($order_id, $pro_id, $quantity, $created_at, $updated_at, 1);
				$rsdetail = order_details::add($orderdetail);
				if($rsdetail == 1){
					echo "<script type='text/javascript'>alert('Sản phẩm đã được thêm vào giỏ hàng.');</script>";
				}else{
					echo "<script type='text/javascript'>alert('Thêm chi tiết đơn hàng không thành công.');</script>";
				}
			}
		} 
    }	
?>
