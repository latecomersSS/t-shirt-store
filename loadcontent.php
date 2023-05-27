<?php
if(isset($_GET['act'])){
	$act=$_GET['act'];
	switch($act){
		case "login":
			include_once('pages/login.php');
			break;
        
        case "register":
            include_once('pages/register.php');
            break;
    
		case "logout":
			include_once('handle/logout.php');
			break;

		case "product":
			include_once('pages/products.php');
			break;

		case "detail":
			include_once('pages/details.php');
			break;

		case "cart":
			include_once('pages/cart.php');
			break;

		case "checkout":
			include_once('pages/checkout.php');
			break;
				
		default:
            include_once('pages/home.php');

	}
	//if($act=='add_product') include_once('addProduct.php');
	//if($act=='list_product') include_once('listProduct.php');
	//if($act=='add_category') include_once('addCategory.php');
	//if($act=='list_cate') include_once('handleAdmin/listCate.php');
}
else{
    include_once('pages/home.php');
}
?>