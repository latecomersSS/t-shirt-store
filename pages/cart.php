<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="./dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./dist/css/style1.css" type="text/css">
</head>

<body>
    <?php
    error_reporting(0);
    if($_SESSION['order_id']){
        $id = $_SESSION['order_id'];
        $cart = orders::getByID($id);
        if($cart){
            $rscart = $cart->fetch_array();
        }      
        $cartdetails = order_details::getById($id);
        $carttotal = 0;
        $price = 0;
        $total = 0;
    }
    ?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table id="c">
                            <thead>
                                <?php
                                if($_SESSION['order_id']){
                                    echo "<tr>
                                            <th class='shoping__product'>Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>";
                                }
                                ?>
                            </thead>
                            <tbody>
                                <?php
                                if($_SESSION['order_id']){
                                    while($rowdetail = $cartdetails->fetch_array()){
                                        $total = 0;
                                        $pro = products::getByID($rowdetail[1]);
                                        $rowproduct = $pro->fetch_array();
                                        $total = number_format($rowproduct[4]*$rowdetail[2], 0);
                                        $carttotal += ($rowproduct[4]*$rowdetail[2]);
                                        $price = number_format($rowproduct[4], 0);
                                        echo "<tr>
                                                <td class='shoping__cart__item'>
                                                    <img src='$rowproduct[6]' alt='' width='60px' height='60px'>
                                                    <h5>$rowproduct[1]</h5>
                                                </td>
                                                <td class='shoping__cart__price'>
                                                    $price
                                                </td>
                                                <td class='shoping__cart__quantity'>
                                                    <div class='quantity'>
                                                        <div class='pro-qty'>
                                                            <input type='text' id='quantity' value='$rowdetail[2]' min='0' max='$rowproduct[5]'>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='shoping__cart__total'>
                                                    $total
                                                </td>
                                                <td class='shoping__cart__item__close'>                                                 
                                                    <a class='btn btn-danger btn-sm' onclick='delpro($rowdetail[0], $rowdetail[1])'>
                                                        <span class='icon_close'></span>
                                                    </a>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<div class='row'>
                                            <div class='col-lg-12 text-center'>
                                                <div class='breadcrumb__text'>
                                                    <h4>Your cart is empty.</h4>
                                                </div>
                                            </div>
                                        </div>";
                                }                             
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text_center">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <?php
                if($_SESSION['order_id']){
                    $fcarttotal = number_format($carttotal, 0);
                    echo "
                    <div class='col-lg-6'>
                        <div class='shoping__continue'>
                            <div class='shoping__discount'>
                                <h5>Discount Codes</h5>
                                <form action='#'>
                                    <input type='text' placeholder='Enter your coupon code'>
                                    <button type='submit' class='site-btn'>APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class='col-lg-6'>
                        <div class='shoping__checkout'>
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span> $fcarttotal VNĐ</span></li>
                                <li>Total <span>$fcarttotal VNĐ</span></li>
                            </ul>
                            <a href='index.php?act=checkout' class='primary-btn'>PROCEED TO CHECKOUT</a>
                        </div>
                </div>";
                }
                ?>
            </div>
            <hr  width="30%" align="center" />
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="breadcrumb__text">
                        <h5>&emsp;<b>Your's order list</b></h5>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table id="ordernew">
                            <thead>
                                <?php
                                $order_new = orders::getListOrderNewByUser($_SESSION['id']);
                                $order_wait = orders::getListOrderWaitByUser($_SESSION['id']);
                                if($order_new || $order_wait){
                                    echo "<tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Total</th>
                                            <th>Detail</th>                                          
                                            <th></th>
                                        </tr>";
                                }
                                ?>
                            </thead>
                            <tbody>
                                <?php
                                if($order_new){
                                    $no = 0;
                                    while($rownew = $order_new->fetch_array()){
                                        $no += 1;
                                        $total = number_format($rownew[6], 0);
                                        echo "<tr>
                                                <td>$no</td>
                                                <td>$rownew[1]</td>
                                                <td>$rownew[2]</td>
                                                <td>$rownew[3]</td>
                                                <td>$total VNĐ</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=detail_order&id=$rownew[0]'>
                                                        <i class='fa fa-info-circle'></i>
                                                    </a>
                                                </td>
                                                <td class='shoping__cart__item__close'>
                                                    <a class='btn btn-danger btn-sm' onclick='cancelorder($rownew[0])'>
                                                        Cancel
                                                    </a>
                                                </td>                     
                                            </tr>";
                                    }
                                }
                                if($order_wait){
                                    while($rowwait = $order_wait->fetch_array()){
                                        $no += 1;
                                        $total = number_format($rowwwait[6], 0);
                                        echo "<tr>
                                                <td>$no</td>
                                                <td>$rowwait[1]</td>
                                                <td>$rowwait[2]</td>
                                                <td>$rowwait[3]</td>
                                                <td>$total VNĐ</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=detail_order&id=$rowwait[0]'>
                                                        <i class='fa fa-info-circle'></i>
                                                    </a>
                                                </td>
                                                <td class='shoping__cart__item__close'>
                                                    <a class='btn btn-primary btn-sm' href=''>
                                                    Delivering
                                                    </a>
                                                </td>                       
                                            </tr>";
                                    }
                                } else {
                                    echo "<div class='row'>
                                            <div class='col-lg-12 text-center'>
                                                <div class='breadcrumb__text'>
                                                    <h4>You have never ordered.</h4>
                                                </div>
                                            </div>
                                        </div>";
                                }                         
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <script>
    function cancelorder(id){
        var order_id = id;
        var result=confirm("Bạn có chắc muốn hủy đơn hàng không?");
        if(result){
            //alert(id.innerHTML);
            window.location="handle/cancelOrder.php?id="+order_id;
        }
    }

    function delpro(orderid, proid){
        var orderid = orderid;
        var proid = proid;
        var result=confirm("Bạn có chắc muốn xóa sản phẩm ra khỏi giỏ hàng?");
        if(result){
            //alert(id.innerHTML);
            window.location="handle/delDetailOnCart.php?orderid="+orderid+"&proid="+proid;
        }
    }

    function changeQuantity(row, orderid, proid){
        var orderid = orderid;
        var proid = proid;
        var table = document.getElementById("c");
        var i = row.parentNode.parentNode.rowIndex;
        var row = table.rows[i];
        var quantity = row.cells[2];
        var result=confirm("Bạn có muốn thay đổi số lượng ?");
        if(result){
            alert(quantity.innerHTML);
            var q = quantity.innerHTML;
            window.location="handle/changeQuantity.php?orderid="+orderid+"&proid="+proid+"&quantity="+q;
        }
}
</script>

    <!-- Js Plugins -->
    <script src="./dist/js/jquery-3.3.1.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>
    <script src="./dist/js/jquery.nice-select.min.js"></script>
    <script src="./dist/js/jquery-ui.min.js"></script>
    <script src="./dist/js/jquery.slicknav.js"></script>
    <script src="./dist/js/mixitup.min.js"></script>
    <script src="./dist/js/owl.carousel.min.js"></script>
    <script src="./dist/js/main.js"></script>


</body>

</html>




<!-- <a class='btn btn-primary btn-sm' onclick='changeQuantity(this, $rowdetail[0], $rowdetail[1])'>Confirm</a> -->