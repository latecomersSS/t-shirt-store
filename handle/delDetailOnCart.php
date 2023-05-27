<?php
if(isset($_GET["orderid"]) && isset($_GET["proid"])){
    $orderid = $_GET["orderid"];
    $proid = $_GET["proid"];
    require('../class/order_details.php');
    $del = order_details::delDetailByProId($orderid, $proid);
    if($del == 1){
        echo "<script type='text/javascript'>alert('Xóa sản phẩm thành công.');</script>";
        header("Location: ../index.php?act=cart");
    } else {
        echo "<script type='text/javascript'>alert('Xóa sản phẩm không thành công.');</script>";
    }
}
?>