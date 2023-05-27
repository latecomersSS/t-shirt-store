<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../class/orders.php');
    $cancel = orders::cancelOrder($id);
    if($cancel == 1){
        echo "<script type='text/javascript'>alert('Hủy đơn hàng thành công.');</script>";
        header("Location: ../index.php?act=cart");
    } else {
        echo "<script type='text/javascript'>alert('Hủy đơn hàng không thành công.');</script>";
    }
}
?>