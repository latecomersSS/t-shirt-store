<?php
if(isset($_GET['act']) && isset($_GET['id'])){
    $id = $_GET['id'];
    require("../class/categories.php");
    $rscategory = categories::getByID($id); 
    $row = $rscategory->fetch_array();
}

?>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Chỉnh sửa danh mục
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="inputName4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName4" name="name" placeholder="Nhập tên danh mục" value="<?php print $row[1]?>">
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả danh mục" value="<?php print $row[2]?>">
                    </div>
                    <div class="col-md-6">
                        <label for="stock_id" class="form-label">Active</label>
                        <select id="stock_id" class="form-select" name="stock_id">
                            <?php 
                            require('../class/stocks.php');
                            $stock = new stocks();
                            $rs = $stock->getAll();
                            while( $r=$rs->fetch_array()){
                                echo "<option value='$r[0]'> $r[1] </option>";
                            }
                            ?>
                        </select>
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
    if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["active"]) && isset($_POST["stock_id"])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $active = $_POST["active"];
        $stock_id = $_POST["stock_id"];
        $updated_at = date("Y-m-d");
        $category = new categories();
        $category->set($id, $name, $description, $stock_id, $created_at, $updated_at, $active);
        $result = categories::getByName($name);
        if($result->num_rows == 1){
            echo "<script type='text/javascript'>alert('Danh mục đã tồn tại.');</script>";
        } else {
            $update = categories::update($category);
            if($update == 1){
                echo "<script type='text/javascript'>alert('Cập nhật danh mục thành công.');</script>";
                header("Location: ../index.php?act=list_category");
            }  
            else echo "<script type='text/javascript'>alert('Cập nhật danh mục không thành công !!!');</script>";
        } 
    }
   ?>



