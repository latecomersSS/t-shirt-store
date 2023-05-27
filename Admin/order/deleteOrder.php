<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../../class/orders.php');
    require('../../class/order_details.php');
    $delDetail = order_details::delByID($id);
    if($delDetail == 1){
        $delOrder = orders::delByID($id);
        if($delOrder == 1){
            echo "<script type='text/javascript'>alert('Xóa đơn hàng thành công.');</script>";
            header("Location: ../index.php?act=list_order_canceled");
        }else{
            echo "<script type='text/javascript'>alert('Xóa đơn hàng không thành công.');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Xóa chi tiết đơn hàng không thành công.');</script>";
    }
}
?>