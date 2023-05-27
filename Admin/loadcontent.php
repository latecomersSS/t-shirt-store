<?php
if(isset($_GET['act'])){
	$act=$_GET['act'];
	switch($act){
		case "login":
			include_once('user/login.php');
			break;

		case "logout":
			include_once('user/logout.php');
			break;

// for stat
		case "stat":
			include_once('stat/index.php');
			break;

		case "listOrder":
			include_once('stat/listOrder.php');
			break;

		case "listOrderDone":
			include_once('stat/listOrderDone.php');
			break;

		case "listOrderWait":
			include_once('stat/listOrderWait.php');
			break;

		case "detailRevenue":
			include_once('stat/detailRevenue.php');
			break;
// end of stat


// for orders

		case "list_order_new":
			include_once('order/list_order_new.php');
			break;

		case "list_order_done":
			include_once('order/list_order_done.php');
			break;

		case "list_order_canceled":
			include_once('order/list_order_canceled.php');
			break;
		case "list_order_wait":
			include_once('order/list_order_wait.php');
			break;

		case "detail_order":
			include_once('order/detailOrder.php');
			break;

// end of orders

// for products

		case "add_product":
			include_once('product/addProduct.php');
			break;

		case "edit_product":
			include_once('product/editProduct.php');
			break;

		case "list_product":
			include_once('product/listProduct.php');
			break;

		case "list_product_over":
			include_once('product/listProductOver.php');
			break;

		case "detail_product":
			include_once('product/detailProduct.php');
			break;

// end of products

// for categories

		case "add_category":
			include_once('Category/addCategory.php');
			break;

		case "list_category":
			include_once('Category/listCategory.php');
			break;
		
		case "edit_category":
			include_once('Category/editCategory.php');
			break;

// end of categories


// for stock

		case "add_stock":
			include_once('stocks/addStock.php');
			break;
	
		case "list_stock":
			include_once('stocks/listStock.php');
			break;
		case "edit_stock":
			include_once('stocks/editStock.php');
			break;

		case "delete_stock":
			include_once('stocks/deleteStock.php');
			break;

// end of stock

// for suppliers

		case "add_supplier":
			include_once('supplier/addSupplier.php');
			break;

		case "list_supplier":
			include_once('supplier/listSupplier.php');
			break;
		
		case "edit_supplier":
			include_once('supplier/editSupplier.php');
			break;
// end of supplier

// account
		case "add_user":
			include_once('user/addUser.php');
			break;	

		case "list_user":
			include_once('user/list_emp.php');
			break;

		case "list_customer":
			include_once('user/listCustomer.php');
			break;
		
		case "edit_user":
			include_once('user/editUser.php');
			break;

		case "detail_user":
			include_once('user/detailUser.php');
			break;
// end of account
		case "list_invoice_in":
			include_once('invoice_in/list_invoice_in.php');
			break;
		
		default:
			include_once('stat/index.php');

	}
	//if($act=='add_product') include_once('addProduct.php');
	//if($act=='list_product') include_once('listProduct.php');
	//if($act=='add_category') include_once('addCategory.php');
	//if($act=='list_cate') include_once('handleAdmin/listCate.php');
}
else{
    include_once('stat/index.php');;
}
?>