<?php
    session_start();
    //error_reporting(0);
    if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["payment_id"]) && isset($_POST["country"]) &&
    isset($_POST["town"]) &&isset($_POST["state"]) &&isset($_POST["address"]) &&isset($_POST["phone"]) && isset($_POST["email"])
    && isset($_POST["note"])&& isset($_POST["user_id"])&& isset($_POST["order_id"]) && isset($_POST["total"])) {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $name = $fname." ".$lname;
        $total = $_POST["total"];
        $payment_id = $_POST["payment_id"];
        $country = $_POST["country"];
        $town = $_POST["town"];
        $state = $_POST["state"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
        $email = $_POST["email"];
        $note = $_POST["note"];
        $user_id = $_POST["user_id"];
        $order_id = $_POST["order_id"];
        $addr = $address.", ".$state.", ".$town.", ".$country;
        require('../class/orders.php');
        //require('../class/order_details.php');
        $ordern = new orders();
        $ordern->set($order_id, $user_id, $user_id, $addr, $payment_id, 1, $phone, $updated_at, $created_at, $note, $name, $total);
        $update = orders::update($ordern);
        if($update == 1){
            unset($_SESSION['order_id']);
            echo "<script type='text/javascript'>alert('Đặt hàng thành công.');</script>";
            header("Location: ../index.php?act=cart");
        } else {
            echo "<script type='text/javascript'>alert('Đặt hàng không thành công.');</script>";
            header("Location: ../index.php?act=checkout");
        }
    }
   ?>
