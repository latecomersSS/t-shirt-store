<?php session_start();?>
<!DOCTYPE HTML>
<html>
	<?php 
	include("pages/header.php"); 
	require('class/products.php');
	require('class/orders.php');
	require('class/order_details.php');
	require('class/suppliers.php');
	require('class/colors.php');
	require('class/sizes.php');
	?>
	<body>
		<!---start-wrap---->
<!---start-header---->
			<div class="header">
				<div class="top-header">
					<div class="wrap">
						<div class="top-header-left">
							<ul>
								<!---cart-tonggle-script---->
								<script type="text/javascript">
									$(function(){
									    var $cart = $('#cart');
									        $('#clickme').click(function(e) {
									         e.stopPropagation();
									       if ($cart.is(":hidden")) {
									           $cart.slideDown("slow");
									       } else {
									           $cart.slideUp("slow");
									       }
									    });
									    $(document.body).click(function () {
									       if ($cart.not(":hidden")) {
									           $cart.slideUp("slow");
									       } 
									    });
									    });
								</script>
								<!---//cart-tonggle-script---->
								<li><a class="cart" href="index.php?act=cart"><span id="clickme"> </span></a></li>
								<!---start-cart-bag---->
								<div id="cart">Your Cart is Empty <span>(0)</span></div>
								<!---start-cart-bag---->
								<li><a class="info" href="index.php?act=cart"><span> </span></a></li>
							</ul>
						</div>
						<div class="top-header-center">
							<div class="top-header-center-alert-left">
								<h3>FREE DELIVERY</h3>
							</div>
							<div class="top-header-center-alert-right">
								<div class="vticker">
								  <ul>
									  <li>Applies to orders of $50 or more. <label>Returns are always free.</label></li>
								  </ul>
								</div>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="top-header-right">
							<?php
							error_reporting(0);
							if($_SESSION['name']){
								$name = $_SESSION['name'];
								$order_id = $_SESSION['order_id'];
								$id = $_SESSION['id'];
								echo "<ul>
										<li><a href='index.php?act=login'>$name</a><span> </span></li>
										<li><a href='handle/logout.php'>Log out</a></li>
									</ul>";
							}
							else{
								echo "<ul>
										<li><a href='index.php?act=login'>Login</a><span> </span></li>
										<li><a href='index.php?act=register'>Join</a></li>
									</ul>";
							}
							?>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----start-mid-head---->
				<div class="mid-header">
					<div class="wrap">
						<div class="mid-grid-left">
							<form action="">
								<input type="text" placeholder="What Are You Looking for?" />
							</form>
						</div>
						<div class="mid-grid-right">
							<!--<a class="logo" href="index.php"><span> </span></a>-->
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----//End-mid-head---->
				<!----start-bottom-header---->
				<div class="header-bottom">
					<div class="wrap">
					<!-- start header menu -->
							<ul class="megamenu skyblue">
								<?php
								require('class/categories.php');
								$categories = categories::getAll();
								while($rowcate = $categories->fetch_array()){
									echo "
									<li class='grid'><a class='color2' href='#'>$rowcate[1]</a>
									<div class='megapanel'>
										<div class='row'>
											<div class='col1'>
												<div class='h_nav'>
													<h4>popular</h4>
													<ul>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>new arrivals</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>men</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>women</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>accessories</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>kids</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>login</a></li>
													</ul>	
												</div>
											</div>
											<div class='col1'>
												<div class='h_nav'>
													<h4>style zone</h4>
													<ul>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>men</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>women</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>accessories</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>kids</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>brands</a></li>
													</ul>	
												</div>							
											</div>
											<div class='col1'>
												<div class='h_nav'>
													<h4>style zone</h4>
													<ul>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>men</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>women</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>accessories</a></li>
														<li><a href='index.php?act=product&cate_id=$rowcate[0]'>brands</a></li>
													</ul>	
												</div>							
											</div>
											<div class='col1 men'>
												<div class = 'men-pic'>
													<img src='images/men.png' title='' />
												</div>
											</div>
										</div>
									</div>
								</li>";
								}
								
								?>
								
							</ul>

					</div>
				</div>
				</div>
				<!----//End-bottom-header---->
			<!---//End-header---->
		<!---- Start main content---->
		<?php require('loadcontent.php');?>

		<!---- End main contain---->
		<div class="bottom-grids">
			<div class="bottom-top-grids">
				<div class="wrap">
					<div class="bottom-top-grid">
						<h4>GET HELP</h4>
						<ul>
							<li><a href="contact.php">Contact us</a></li>
							<li><a href="#">Shopping</a></li>
							<li><a href="#">NIKEiD</a></li>
							<li><a href="#">Nike+</a></li>
						</ul>
					</div>
					<div class="bottom-top-grid">
						<h4>ORDERS</h4>
						<ul>
							<li><a href="#">Payment options</a></li>
							<li><a href="#">Shipping and delivery</a></li>
							<li><a href="#">Returns</a></li>
						</ul>
					</div>
					<div class="bottom-top-grid last-bottom-top-grid">
						<h4>REGISTER</h4>
						<p>Create one account to manage everything you do with Nike, from your shopping preferences to your Nike+ activity.</p>
						<a class="learn-more" href="#">Learn more</a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
			<div class="bottom-bottom-grids">
				<div class="wrap">
					<div class="bottom-bottom-grid">
						<h6>EMAIL SIGN UP</h6>
						<p>Be the first to know about new products and special offers.</p>
						<a class="learn-more" href="#">Sign up now</a>
					</div>
					<div class="bottom-bottom-grid">
						<h6>GIFT CARDS</h6>
						<p>Give the gift that always fits.</p>
						<a class="learn-more" href="#">View cards</a>
					</div>
					<div class="bottom-bottom-grid last-bottom-bottom-grid">
						<h6>STORES NEAR YOU</h6>
						<p>Locate a Nike retail store or authorized retailer.</p>
						<a class="learn-more" href="#">Search</a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
		</div>
		<!---- //End-bottom-grids---->
		<!--- //End-content---->
		<?php include("pages/footer.php"); ?>
		<!---//End-wrap---->
	</body>
</html>

