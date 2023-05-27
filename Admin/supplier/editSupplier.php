<?php
if(isset($_GET['act']) && isset($_GET['id'])){
    $id = $_GET['id'];
    require("../class/suppliers.php");
    $rssupplier = suppliers::getByID($id); 
    $row = $rssupplier->fetch_array();
}

?>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Chỉnh sửa nhà cung cấp
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhà cung cấp" value="<?php print $row[1]?>">
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ nhà cung cấp" value="<?php print $row[2]?>">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email" value="<?php print $row[3]?>">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="<?php print $row[4]?>">
                    </div>
                    <div class="col-md-6">
                        <label for="active" class="form-label">Active</label>
                        <select id="active" class="form-select" name="active">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>


        <?php
    error_reporting(0);
    if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["active"]) && isset($_POST["email"])
    && isset($_POST["phone"])) {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $active = $_POST["active"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $updated_at = date("Y-m-d");
        require('../class/suppliers.php');
        $supplier = new suppliers();
        $supplier->set($id, $name, $address, $email, $phone, $updated_at, $updated_at, $active);
        $result = suppliers::getByName($name);
        if($result->num_rows == 1){
            echo "<script type='text/javascript'>alert('Nhà cung cấp đã tồn tại.');</script>";
        } else {
            $update = suppliers::update($supplier);
            if($update == 1){
                echo "<script type='text/javascript'>alert('Cập nhật nhà cung cấp thành công.');</script>";
                header("Location: ../index.php?act=list_supplier");
            }  
            else echo "<script type='text/javascript'>alert('Cập nhật nhà cung cấp không thành công !!!');</script>";
        } 
    }
   ?>



