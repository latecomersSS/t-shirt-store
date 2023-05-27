<?php
if(isset($_GET["act"]) && isset($_GET["id"])){
    $id = $_GET["id"];
    require("../class/products.php");
    require("../class/categories.php");
    require("../class/suppliers.php");
    $rsproduct = products::getByID($id); 
    $rowpro = $rsproduct->fetch_array();
    $rsdetail = products::getDetailByID($id);
    $price = number_format($rowpro[4], 0);
    $supl = suppliers::getNameById($rowpro[3]);
    $cate = categories::getNameById($rowpro[2]);
}
?>

<div class="container-fluid pt-4">
<div class="row m-2 mb-5"><h5>Mô tả sản phẩm</h5></div>
<div class="row m-2 mb-5">
    <div class="col-md-4 pl-4">
        <img width="350px" height="400px" src="../<?php echo $rowpro[6]?>">
    </div>
    <div class="col-md-8 pl-2">
        <p><b>Tên sản phẩm:</b> <?php echo $rowpro[1]?></p>
        <p><b>Loại sản phẩm: </b><?php echo $cate ?></p>
        <p><b>Nhà cung cấp: </b><?php echo $supl?></p>
        <p><b>Đơn giá: </b><?php echo $price?> VND</p>
        <p><b>Số lượng tồn: </b><?php echo $rowpro[5]?></p>
        <p><b>Cập nhật: </b><?php echo $rowpro[5]?></p>
        <p><b>Mô tả: </b><?php echo $rowpro[7]?></p>
    </div>
</div>
<div class="row m-2 mb-5"><h5>Tình trạng đặt hàng</h5></div>
</div>
            