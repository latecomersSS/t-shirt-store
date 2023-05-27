<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../../class/invoices_in.php');
    $result = invoices_in::delByID($id);
    if($result == 1){
        echo "<script type='text/javascript'>alert('Xóa hóa đơn nhập thành công.');</script>";
        header("Location: ../index.php?act=list_invoices_in");
    } else {
        echo "<script type='text/javascript'>alert('Xóa hóa đơn nhập không thành công.');</script>";
        header("Location: ../index.php?act=list_invoices_in");
    }
}
?>