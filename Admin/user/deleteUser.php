<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../../class/users.php');
    $result = users::delByID($id);
    $result1 = users::delRoleByID($id);
    if(($result == 1)){
        if($result1 == 1){
            echo "<script type='text/javascript'>alert('Xóa tài khoản thành công.');</script>";
            header("Location: ../index.php?act=list_user");
        } else {
            echo "<script type='text/javascript'>alert('Xóa quyền tài khoản thành công.');</script>";
            header("Location: ../index.php?act=list_user");
        }
    } else {
        echo "<script type='text/javascript'>alert('Xóa sản phẩm không thành công.');</script>";
        header("Location: ../index.php?act=list_user");
    }
}
?>