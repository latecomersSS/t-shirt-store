<?php 
	require('../class/products.php');
	require('../class/orders.php');
	require('../class/order_details.php');
	require('../class/suppliers.php');
	require('../class/colors.php');
	require('../class/sizes.php');
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

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

	<div class="container">
        <div class="row">
		         <br />
		         <h2 align="center">Advance Ajax Product Filters in PHP</h2>
		         <br />
		            <div class="col-md-3">                    
		    <div class="list-group">
		     <h3>Price</h3>
		     <input type="hidden" id="hidden_minimum_price" value="100000" />
                    <input type="hidden" id="hidden_maximum_price" value="5000000" />
                    <p id="price_show">100000 - 5000000</p>
                    <div id="price_range"></div>
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
				                    <div class="list-group-item checkbox">
				                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $supplierRow[0]; ?>"  > <?php echo $supplierRow[1]; ?></label>
				                    </div>
				                    <?php
				                    }

                    ?>
                    </div>
                </div>

    			<div class="list-group">
    				 <h3>Color</h3>
                    <?php

		                    $color = new colors();
		                    $resultColor = $color ->getAll();
			                while ($rowColor = $resultColor->fetch_array()){
		            ?>
		                    <div class="list-group-item checkbox">
		                        <label><input type="checkbox" class="common_selector color" value="<?php echo $rowColor[0]; ?>" > <?php echo $rowColor[1]; ?> </label>
		                    </div>
		            <?php    
		                  }

                    ?>
                </div>
    
    <div class="list-group">
     <h3>Size</h3>
     <?php
                    $size = new sizes();
                    $resultSize = $size -> getAll();
                    while($rowSize = $resultSize->fetch_array()){

                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector size" value="<?php echo $rowSize[0]; ?>"  > <?php echo $rowSize[1]; ?> </label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
            </div>

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
			        var brand = get_filter('brand');
			        var color = get_filter('color');
			        var size = get_filter('size');
			        $.ajax({
			            url:"fetch_data.php",
			            method:"POST",
			            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, color:color, size:size},
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
			        values:[100000, 35000000],
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