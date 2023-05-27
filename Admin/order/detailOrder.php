<?php
if(isset($_GET["act"]) && isset($_GET["id"])){
    $id = $_GET["id"];
    require("../class/products.php");
    require("../class/orders.php");
    require("../class/order_details.php");
    require("../class/users.php");
    require("../class/payments.php");
    $rsorder = orders::getByID($id);
    $order = $rsorder->fetch_array();
    $rsdetail = order_details::getByID($id);
    $total = number_format($order[11], 0);
    $emp = users::getNameByID($order[1]);
    $payment = payments::getNameByID($order[3]);
    $no = 1;
}
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Chi tiết đơn đặt hàng
    </div>
    <div class="card-body">
        <div class="row m-2">
            <div class="col-md-6 pl-2">
                <p><b>Tên khách hàng: </b> <?php echo $order[10]?></p>
                <p><b>Số điện thoại: </b> <?php echo $order[5]?></p>
                <p><b>Phương thức thanh toán: </b> <?php echo $payment?></p>
                <p><b>Nhân viên: </b> <?php echo $emp?></p>
            </div>
            <div class="col-md-6 pl-2">
                <p><b>Giá trị đơn hàng: </b> <?php echo $total?> VNĐ</p>
                <p><b>Ngày lập hóa đơn:</b> <?php echo $order[7]?></p>
                <p><b>Địa chỉ giao hàng: </b><?php echo $order[2]?></p>
                <p><b>Ghi chú: </b><?php echo $order[8]?></p>
            </div>
        </div>
        <b class="m-2">Danh sách sản phẩm: </b>
        <table class="table table-bordered table-striped p-2 m-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = $rsdetail->fetch_array()){
                    $rsproduct = products::getByID($row[1]);
                    $product = $rsproduct->fetch_array();
                    $price = number_format($product[4], 0);  
                    echo "<tr>
                        <td>$no</td>
                        <td>$product[1]</td>
                        <td><img src='../$product[6]' width='80px' height='60px'></td>
                        <td>$row[2]</td>
                        <td>$price VND</td>
                    </tr>";
                    $no += 1;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
            