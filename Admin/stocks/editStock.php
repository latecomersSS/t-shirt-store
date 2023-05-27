<?php
if(isset($_GET['act']) && isset($_GET['id'])){
    $id = $_GET['id'];
    require("../class/stocks.php");
    $stock = new stocks();
    $result = stocks::getByID($id); 
    $row = $result->fetch_array();
}

?>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Chỉnh sửa kho hàng
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="inputName4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName4" name="name" placeholder="Nhập tên kho hàng" value="<?php print $row[1]?>">
                    </div>
                    <div class="col-md-12">
                        <label for="inputName4" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ kho hàng" value="<?php print $row[2]?>">
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
    if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["active"])) {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $active = $_POST["active"];
        $created_at = $row[3];
        $updated_at = date("Y/m/d");
        $stocks = new stocks();
        $stocks->set($id, $name, $address, $active, $created_at, $updated_at);
        $result = stocks::getByName($stock->getName()); 
        if($result->num_rows == 1){
            echo "<script type='text/javascript'>alert('Kho hàng đã tồn tại.');</script>";
        }else{
            $update = stocks::update($stocks); 
            if($update == 1){  
                echo "<script type='text/javascript'>alert('Cập nhật kho hàng thành công.');</script>";
                header("Location: ../index.php?act=list_stock");
            } else{
                echo "<script type='text/javascript'>alert('Cập nhật kho hàng không thành công !!!');</script>";
            }
        }
    }
   ?>



