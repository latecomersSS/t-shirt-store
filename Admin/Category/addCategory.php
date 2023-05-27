<?php
    require('../class/stocks.php');
    $stock = new stocks();
    $result = $stock->getAll();
?>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Thêm danh mục mới
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data" name="addCategory" onsubmit="return addCategoryForm()">
                    <div class="col-md-12">
                        <label for="inputName4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName4" name="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả danh mục">
                    </div>
                    <div class="col-md-6">
                        <label for="stock_id" class="form-label">Stock</label>
                        <select id="stock_id" class="form-select" name="stock_id">
                            <?php
                            while( $row=$result->fetch_array()){
                                echo "<option value='$row[0]'> $row[1] </option>";
                            }
                            ?>
                        </select>
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
    if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["active"]) && isset($_POST["stock_id"])) {

        $name = $_POST["name"];
        $description = $_POST["description"];
        $active = $_POST["active"];
        $stock_id = $_POST["stock_id"];
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
        require('../class/categories.php');
        $category = new categories();
        $category->set(NULL, $name, $description, $stock_id, $created_at, $updated_at, $active);
        $result = categories::getByName($name);
        if($result->num_rows == 1){
            echo "<script type='text/javascript'>alert('Danh mục đã tồn tại.');</script>";
        } else {
            $add = categories::add($category);
            if($add == 1)  echo "<script type='text/javascript'>alert('Thêm danh mục thành công.');</script>";
            else echo "<script type='text/javascript'>alert('Thêm danh mục không thành công !!!');</script>";
        } 
    }
   ?>



