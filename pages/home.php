<div class="img-slider">
			<div class="wrap">
			<ul id="jquery-demo">
			  <li>
			    <a href="index.php?act=product">
			      <img width="650px" height="650px" src="images/t-shirt/CandlesPartyNeverEndTshirt.jpeg" alt="" />
			    </a>
			    <div class="slider-detils">
			    	<h4>Candles Party Never End <label> TShirt</label></h4>
			    	<span>Stay true to your team all day, every day, game day.</span>
			    	<a class="slide-btn" href="index.php?act=product"> Shop Now</a>
			    </div>
			  </li>
			  <li>
			    <a href="index.php?act=product">
					<img width="650px" height="650px" src="images/t-shirt/clownzAcademySweatShirtBlack.jpeg" alt="" />
			    </a>
			     <div class="slider-detils">
			    	<h4>CLOWNZ ACADEMY <label> SWEATSHIRT</label></h4>
			    	<span>Stay true to your team all day, every day, game day.</span>
			    	<a class="slide-btn" href="index.php?act=product"> Shop Now</a>
			    </div>
			  </li>
			  <li>
			    <a href="index.php?act=product">
					<img width="650px" height="650px" src="images/t-shirt/clownzGraffitiTagPoloBlack.jpeg" alt="" />
			    </a>
			     <div class="slider-detils">
			    	<h4>Clownz Graffiti  <label> POLO</label></h4>
			    	<span>Stay true to your team all day, every day, game day.</span>
			    	<a class="slide-btn" href="index.php?act=product"> Shop Now</a>
			    </div>
			  </li>
			</ul>
			</div>
		</div>
		<div class="clear"> </div>
		<!----//End-image-slider---->
		<!----start-price-rage--->
		<div class="wrap">
			<div class="price-rage">
				<h3>Weekly selection:</h3>
				<div id="slider-range">
				</div>
			</div>
		</div>
		<!----//End-price-rage--->
		<!--- start-content---->
		<div class="content">
			<div class="wrap">
					<div class="product-grids">
						<?php
						$cond = 'price';
						$nproduct = products::getTop($cond, 6);
						while($nprow = $nproduct->fetch_array()){
							$id = $nprow[0];
							$cateName = categories::getNameById($nprow[2]);
							$price = number_format($nprow[4], 0);
							echo "<div onclick='' class='product-grid fade'>
									<div class='product-grid-head'>
										<div class='block'>
											<div class='starbox small ghosting'> </div> <span> $nprow[5]</span>
										</div>
									</div>
									<div class='product-pic'>
										<a href='#'><img src='$nprow[6]' title='$nprow[1]' height='280px' width='90%'></a>
										<p>
										<a href='#'><small></small> $nprow[1] <small></small> FG</a>
										<span>$cateName</span>
										</p>
									</div>
									<div class='product-info'>
										<div class='product-info-cust'>
											<a href='index.php?act=detail&id=$nprow[0]'>Details</a>
										</div>
										<div class='product-info-price'>
											<a href='index.php?act=detail&id=$nprow[0]'> $price VND</a>
										</div>
										<div class='clear'> </div>
									</div>
									<div class='more-product-info'>
										<span> </span>
									</div>
								</div>";
						}
					?>	
				<div class="clear"> </div>
			</div>
		</div>

		<div class="wrap">
			<div class="price-rage">
				<h3>Top search:</h3>
				<div id="slider-range">
				</div>
			</div>
		</div>
		<div class="content">
			<div class="wrap">
					<div class="product-grids">
					<?php
							$cond = 'quantity';
							$tsproduct = products::getTop($cond, 3);
							while($tsrow = $tsproduct->fetch_array()){
								$id = $tsrow[0];
								$cateName = categories::getNameById($tsrow[2]);
								$price = number_format($tsrow[4], 0);
								echo "<div onclick='' class='product-grid fade'>
										<div class='product-grid-head'>
											<div class='block'>
												<div class='starbox small ghosting'> </div> <span> $tsrow[5]</span>
											</div>
										</div>
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
												<a href='index.php?act=detail&id=$tsrow[0]'>$price VND</a>
											</div>
											<div class='clear'> </div>
										</div>
										<div class='more-product-info'>
											<span> </span>
										</div>
									</div>";
							}
						?>						
						<div class="clear"> </div>
					</div>
				<div class="clear"> </div>
			</div>
		</div>