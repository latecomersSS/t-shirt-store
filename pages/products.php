<?php
if(isset($_GET['cate_id'])){
    $cate_id = $_GET['cate_id'];
    $rsproduct = products::getByCate($cate_id); 
	$numpro = productS::countByCate($cate_id);
}elseif (isset($_GET['lowprice'])){
	$cond = 'price';
	$rsproduct = products::getBottom($cond, 9);
	$numpro = productS::countAll();
}elseif (isset($_GET['highprice'])){
	$cond = 'price';
	$rsproduct = products::getTop($cond, 9);
	$numpro = productS::countAll();
}else{
    $rsproduct = products::getAll();
	$numpro = productS::countAll();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <script src="pages/js/jquery-1.10.2.min.js"></script>
    <script src="pages/js/jquery-ui.js"></script>
    <script src="pages/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="pages/css/bootstrap.min.css">
    <link href = "pages/css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="pages/css/style.css" rel="stylesheet">
</head>

<body>
		<!--- start-content---->

<!-- code cũ
		<div class="content product-box-main">
			<div class="wrap">
				<div class="content-left">
						<div class="content-left-top-grid">
							<div class="content-left-price-selection content-left-top-brands-prices">
								<h4>Select Price:</h4>
								<div class="price-selection-tree">
									<span class="col_checkbox">
										<input id="12" class="css-checkbox12" type="checkbox">
										<label class="normal"><i for="12" name="demo_lbl_12"  class="css-label12"> </i> < 100k </label>
									</span>
									<span class="col_checkbox">
										<input id="12" class="css-checkbox12" type="checkbox">
										<label class="normal"><i for="12" name="demo_lbl_12"  class="css-label12"> </i>100-300k</label>
									</span>
									<span class="col_checkbox">
										<input id="13" class="css-checkbox13" type="checkbox">
										<label class="normal"><i for="13" name="demo_lbl_13"  class="css-label13"> </i>300-500k</label>
									</span>
									<span class="col_checkbox">
										<input id="14" class="css-checkbox14" type="checkbox">
										<label class="normal"><i for="14" name="demo_lbl_14"  class="css-label14"> </i> > 500k </label>
									</span>
								</div>
								<h4>Select Size:</h4>
								<form action="" method="GET">
									<?php
									//require('class/sizes.php');
									//$listsize = sizes::getAll();
									//while($size = $listsize->fetch_array()){
									//	echo "
									//	<input type='checkbox' id='$size[1]' name='filter[]' value='$size[0]'>
                             		//	<label for='$size[1]'>$size[1]</label><br>";
									//}
								?>		
								<button type="submit" class="btn btn-primary">Filter</button>
								</form>						
						</div>
						</div>
				</div>




				<div class="content-right product-box">
					<div class="product-box-head">
							<div class="product-box-head-left">
								<h3>Products <span>(<?php echo $numpro;?>)</span></h3>
							</div>
							<div class="product-box-head-right">
								<ul>
									<li><span>Sort ::</span><a href="#"> </a></li>
									<li><label> </label> <a href="#"> Popular</a></li>
									<li><label> </label> <a href="#"> New</a></li>
									<li><label> </label> <a href="#"> Discount</a></li>
									<li><span>Price ::</span><a href="index.php?act=product&lowprice"> Low</a> <a href="index.php?act=product&highprice"> High</a></li>
								</ul>
							</div>
							<div class="clear"> </div>
					</div>


					 <div class="product-grids"> 
						<!--- start-rate---->
							<!---//End-rate---->
						<?php
						//	 while($rowpro = $rsproduct->fetch_array()){
						//	 	$id = $rowpro[0];
						//	 	$cateName = categories::getNameById($rowpro[2]);
						//	 	$name = number_format($rowpro[4], 0);
						//	 	echo "<div onclick='' class='product-grid fade'>
						//	 				<div class='product-grid-head'>
						//	 					<div class='block'>
						//	 						<div class='starbox small ghosting'> </div> <span> $rowpro[5]</span>
						//	 					</div>
						//	 				</div>
						//	 				<div class='product-pic'>
						//	 					<a href='#'><img src='images/product5.jpg' title='$rowpro[1]' /></a>
						//	 					<p>
						//	 					<a href='#'><small>$rowpro[1]</small></a>
						//	 					<span>$cateName</span>
						//	 					</p>
						//	 				</div>
						//	 				<div class='product-info'>
						//	 					<div class='product-info-cust'>
						//	 						<a href='index.php?act=detail&id=$rowpro[0]'>Details</a>
						//	 					</div>
						//	 					<div class='product-info-price'>
						//	 						<a href='index.php?act=detail&id=$rowpro[0]'>$name VNĐ</a>
						//	 					</div>
						//	 					<div class='clear'> </div>
						//	 				</div>
						//	 				<div class='more-product-info'>
						//	 					<span> </span>
						//	 				</div>
						//	 		</div>";
						//	 }
						?>						
						
						 <!-- <div class="clear"> </div>
					</div> -->

					

					<!----start-load-more-products---->
				<!--	<div class="loadmore-products">
						<a href="#">Loadmore</a>
					</div>
					End-load-more-products
			</div>
		<div class="clear"> </div>
	</div>
</div> -->

	<div class="container">
        <div class="row">
		         <br />
		         <br />
		 <div class="col-md-3">                    
		    <div class="list-group">
		     <h3>Price</h3>
		     <input type="hidden" id="hidden_minimum_price" value="100000" />
                    <input type="hidden" id="hidden_maximum_price" value="3500000" />
                    <p id="price_show">100000 - 3500000</p>
                    <div id="price_range"></div>
                </div>

                <div class="list-group" hidden>
				<div class="form-check ">
		                        <label><input type="checkbox" class="common_selector cate" value="<?php echo $cate_id; ?>"  checked>  </label>
		                    </div>
				</div>
                <div class="list-group">
     					<h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
				     <?php
				     			$supplier = new suppliers();
				     			$resultSupplier =  $supplier -> getAll();
				                   while($supplierRow = $resultSupplier->fetch_array())
				                    {
				                    ?>
				                    <div class="form-check">
				                        <label><input type="checkbox" style="display: inline-block;" class="common_selector brand" value="<?php echo $supplierRow[0]; ?>"  > <?php echo $supplierRow[1]; ?></label>

				                    </div>
				                    <br/>
				                    <?php
				                    }

                    ?>
                    </div>
                </div>

    			<div class="list-group">
    				 <h3>Color</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">

                    <?php

		                    $color = new colors();
		                    $resultColor = $color ->getAll();
			                while ($rowColor = $resultColor->fetch_array()){
		            ?>
		                    <div class="form-check ">
		                        <label><input type="checkbox" class="common_selector color" value="<?php echo $rowColor[0]; ?>" > <?php echo $rowColor[1]; ?> </label>
		                    </div>
		            <?php    
		                  }

                    ?>
                </div>
                <br/>
            </div>
    
    <div class="list-group">
     <h3>Size</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">

    		 <?php
                    $size = new sizes();
                    $resultSize = $size -> getAll();
                    while($rowSize = $resultSize->fetch_array()){

                    ?>
                    <div class="form-check">
                        <label><input type="checkbox" class="common_selector size" value="<?php echo $rowSize[0]; ?>"  > <?php echo $rowSize[1]; ?> </label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
            </div>
        </div>
            <br/>

            <div class="col-md-9">
             <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>					
				
	


<style>
#loading
		{
		 text-align:center; 
		 background: url('loader.gif') no-repeat center; 
		 height: 150px;
		}
</style>

<script>
			$(document).ready(function(){

			    filter_data();

			    function filter_data()
			    {
			        $('.filter_data').html('<div id="loading" style="" ></div>');
			        var action = 'fetch_data';
			        var minimum_price = $('#hidden_minimum_price').val();
			        var maximum_price = $('#hidden_maximum_price').val();
					var cate = get_filter('cate');
			        var brand = get_filter('brand');
			        var color = get_filter('color');
			        var size = get_filter('size');
			        $.ajax({
			            url:"pages/fetch_data.php",
			            method:"POST",
			            data:{action:action,cate:cate, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, color:color, size:size},
			            success:function(data){
			                $('.filter_data').html(data);
			            }
			        });
			    }

			    function get_filter(class_name)
			    {
			        var filter = [];
			        $('.'+class_name+':checked').each(function(){
			            filter.push($(this).val());
			        });
			        return filter;
			    }

			    $('.common_selector').click(function(){
			        filter_data();
			    });

			    $('#price_range').slider({
			        range:true,
			        min:100000,
			        max:3500000,
			        values:[100000, 3500000],
			        step:10000,
			        stop:function(event, ui)
			        {
			            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
			            $('#hidden_minimum_price').val(ui.values[0]);
			            $('#hidden_maximum_price').val(ui.values[1]);
			            filter_data();
			        }
			    });

			});
</script>
</body>
</html>


