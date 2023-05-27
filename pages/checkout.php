
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check out</title>

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
    <link rel="stylesheet" href="./dist/css/style.css" type="text/css">
</head>

<body>
<?php
    if($_SESSION['order_id']){
        $order_id = $_SESSION['order_id'];
        $cart = orders::getByID($order_id);
        if($cart){
            $rscart = $cart->fetch_array();
        }      
        $cartdetails = order_details::getById($order_id);
        $carttotal = 0;
        $total = 0;
    }
    ?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="handle/addCart.php" method="POST" enctype="multipart/form-data" name="checkout" onsubmit="return checkoutForm()">
                    <input type="hidden" name="order_id" value="<?php echo $order_id?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']?>">
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="fname" id="fname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lname" id="lname">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" id="country">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town" id="town">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state" id="state">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address" id="address">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="checkout__input">
                                    <p>Payment<span>*</span></p>
                                    <select id="payment_id" name="payment_id" id="payment_id">
                                    <?php
                                        require('class/payments.php');
                                        $payments = payments::getAll();
                                        while( $rowpay=$payments->fetch_array()){
                                            echo "<option value='$rowpay[0]'> $rowpay[1] </option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="note" id="note"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                <?php
                                    while($rowdetail = $cartdetails->fetch_array()){
                                        $total = 0;
                                        $pro = products::getByID($rowdetail[1]);
                                        $rowproduct = $pro->fetch_array();
                                        $total = number_format($rowproduct[4]*$rowdetail[2], 0);
                                        $carttotal += ($rowproduct[4]*$rowdetail[2]);
                                        echo "<li>$rowproduct[1]<span>$total</span></li>";
                                        }                               
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span><?php echo number_format($carttotal, 0) . " VNĐ"?></span></div>
                                <input type="hidden" value="<?php echo $carttotal; ?>" name="total">
                                <div class="checkout__order__total">Total <span><?php echo number_format($carttotal, 0) . " VNĐ"?></span></div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <script src="./dist/js/jquery-3.3.1.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>
    <script src="./dist/js/jquery.nice-select.min.js"></script>
    <script src="./dist/js/jquery-ui.min.js"></script>
    <script src="./dist/js/jquery.slicknav.js"></script>
    <script src="./dist/js/mixitup.min.js"></script>
    <script src="./dist/js/owl.carousel.min.js"></script>
    <script src="./dist/js/main.js"></script>
    <script src="./js/main.js"></script>
