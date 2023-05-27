
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Thêm kho hàng mới
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data" name="addStock" onsubmit="return addStockForm()">
                    <div class="col-md-12">
                        <label for="inputName4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName4" name="name" placeholder="Nhập tên kho hàng">
                    </div>
                    <div class="col-md-12">
                        <label for="inputName4" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ kho hàng">
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
    if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["active"])) {

        $name = $_POST["name"];
        $address = $_POST["address"];
        $active = $_POST["active"];
        $created_at = date("Y/m/d");
        $updated_at = date("Y/m/d");
        require('../class/stocks.php');
        $stock = new stocks();
        $stock->set(NULL, $name, $address, $active, $created_at, $updated_at);
        $result = stocks::getByName($stock->getName()); 
        if($result->num_rows == 1){
            echo "<script type='text/javascript'>alert('Kho hàng đã tồn tại.');</script>";
        } else {
            $add = stocks::add($stock);
            if($add == 1)  echo "<script type='text/javascript'>alert('Thêm kho hàng thành công.');</script>";
            else echo "<script type='text/javascript'>alert('Thêm kho hàng không thành công !!!');</script>";
        } 
    }
   ?>



