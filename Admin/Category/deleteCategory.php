<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    require('../../class/categories.php');
    $category = new categories();
    $result = $category->delByID($id);
    if($result == 1){
        echo "<script type='text/javascript'>alert('Xóa danh mục thành công.');</script>";
        header("Location: ../index.php?act=list_category");
    } else {
        echo "<script type='text/javascript'>alert('Xóa danh mục không thành công.');</script>";
    }
}
?>