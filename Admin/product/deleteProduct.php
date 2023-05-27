<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../../class/products.php');
    require('../../class/invoices_in.php');
    $delDetail = products::delDetailByID($id);
    if($delDetail == 1){
        $delinv = invoices_in::delByProID($id);
        $delpro = products::delByID($id);
        if($delpro == 1){
            echo "<script type='text/javascript'>alert('Xóa sản phẩm thành công.');</script>";
            header("Location: ../index.php?act=list_product");
        }else{
            echo "<script type='text/javascript'>alert('Xóa sản phẩm không thành công.');</script>";
            header("Location: ../index.php?act=list_product");
        }
    } else {
        echo "<script type='text/javascript'>alert('Xóa chi tiết sản phẩm không thành công.');</script>";
        header("Location: ../index.php?act=list_product");
    }
}
?>