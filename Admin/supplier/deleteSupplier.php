<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../../class/suppliers.php');
    $supplier = new suppliers();
    $result = $supplier->delByID($id);
    if($result == 1){
        echo "<script type='text/javascript'>alert('Xóa nhà cung cấp thành công.');</script>";
        header("Location: ../index.php?act=list_supplier");
    } else {
        echo "<script type='text/javascript'>alert('Xóa nhà cung cấp không thành công.');</script>";
    }
}
?>