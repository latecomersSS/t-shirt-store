        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Thêm nhà cung cấp mới
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data" name="addSupplier" onsubmit="return addSupplierForm()">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhà cung cấp">
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ nhà cung cấp">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="col-md-6">
                        <label for="active" class="form-label">Active</label>
                        <select id="active" class="form-select" name="active">
                            <?php ?>
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
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
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
        require('../class/suppliers.php');
        $supplier = new suppliers();
        $supplier->set(NULL, $name, $address, $email, $phone, $created_at, $updated_at, $active);
        $result = suppliers::getByName($name);
        if($result->num_rows == 1){
            echo "<script type='text/javascript'>alert('Nhà cung cấp đã tồn tại.');</script>";
        } else {
            $add = suppliers::add($supplier);
            if($add == 1)  echo "<script type='text/javascript'>alert('Thêm nhà cung cấp thành công.');</script>";
            else echo "<script type='text/javascript'>alert('Thêm nhà cung cấp không thành công !!!');</script>";
        } 
    }
   ?>



