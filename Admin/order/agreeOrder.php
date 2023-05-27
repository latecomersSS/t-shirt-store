<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $quantity = 0;
    $pro_id = 0;
    $valuesub = 0;
    require('../../class/orders.php');
    require('../../class/products.php');
    require('../../class/order_details.php');
    $cancel = orders::agreeOrder($id);
    if($cancel == 1){
        $listdetail = order_details::getByID($id);
        while($detail = $listdetail->fetch_array()){
            $quantity = $detail[2];
            $pro_id = $detail[1];
            $valuesub = products::subtractQuantityPro($pro_id, $quantity);
        }
        echo "<script type='text/javascript'>alert('Xác nhận giao đơn hàng thành công.');</script>";
        header("Location: ../index.php?act=list_order_new");
    } else {
        echo "<script type='text/javascript'>alert('Xác nhận giao đơn hàng không thành công.');</script>";
    }
}
?>