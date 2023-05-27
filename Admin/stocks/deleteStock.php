<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../../class/stocks.php');
    $stock = new stocks();
    $result = $stock->delByID($id);
    if($result == 1){
        echo "<script type='text/javascript'>alert('Xóa kho hàng thành công.');</script>";
        header("Location: ../index.php?act=list_stock");
    } else {
        echo "<script type='text/javascript'>alert('Xóa kho hàng không thành công.');</script>";
    }
}
?>