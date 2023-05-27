<?php
if(isset($_GET['act']) && isset($_GET['id'])){
    $id = $_GET['id'];
    require("../class/products.php");
    $rsproduct = products::getByID($id); 
    $rowpro = $rsproduct->fetch_array();
}
?>

<main>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Chỉnh sửa sản phẩm <?php echo $rowpro[1]?>
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="GET" enctype="multipart/form-data" name="addProduct" onsubmit="return addProductForm()">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" value="<?php print $rowpro[1]?>">
                    </div>

                    <div class="col-md-6">
                        <label for="suplier_id" class="form-label">Supplier</label>
                        <select id="suplier_id" class="form-control" name="suplier_id">
                            <option selected>Choose...</option>
                                <?php 
                                    //require_once("D:\\xampp\\htdocs\\t-shirt-store\\class\\suppliers.php");
                                    require('../class/suppliers.php');
                                    $supplier = new suppliers();
                                    $resultsup = $supplier -> getAll();
                                    while( $rowsup = $resultsup ->fetch_array()){
                                        echo "<option value='$rowsup[0]'> $rowsup[1] </option>";
                                    }
                                ?>
                            
                        </select>
                    </div>
     
                    <div class="col-md-6">
                        <label for="cate_id" class="form-label">Category</label>
                    
                        <select id="cate_id" class="form-select" name="cate_id">
                            <option selected>Choose...</option>
                                <?php
                                    //require_once("D:\\xampp\\htdocs\\t-shirt-store\\class\\categories.php");
                                    require('../class/categories.php');
                                    $cate = new categories();
                                    $rscate = $cate->getAll();
                                    while($rowcate = $rscate->fetch_array()){
                                        echo "<option value='$rowcate[0]'>$rowcate[1]</option>";
                                    }
                                ?>
                            <option>...</option>
                        </select>
                    </div>
     
                    <div class="col-6">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="<?php print $rowpro[5]?>">
                    </div>
                    <div class="col-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php print $rowpro[4]?>">
                    </div>
     
                    <div class="col-6">
                        <label for="size" class="form-label">Size</label>
                        <select id="size" class="form-select" name="size">
                            <option selected>Choose...</option>
                            <?php
                                    require('../class/sizes.php');
                                    $size = new sizes();
                                    $rssize = $size->getAll();
                                    while($rowsize = $rssize->fetch_array()){
                                        echo "<option value='$rowsize[0]'>$rowsize[1]</option>";
                                    }
                            ?>
                        </select>
                    </div>
     
                    <div class="col-6">
                        <label for="color" class="form-label">Color</label>
                        <select id="color" class="form-select" name="color">
                            <option selected>Choose...</option>
                            <?php
                                    require('../class/colors.php');
                                    $color = new colors();
                                    $rscolor = $color->getAll();
                                    while($rowcolor = $rscolor->fetch_array()){
                                        echo "<option value='$rowcolor[0]'>$rowcolor[1]</option>";
                                    }
                            ?>
                        </select>
                    </div>
     
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"><?php print $rowpro[7]?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="file" class="form-label">Image</label>
                        <input type="file" name="file" class="form-control" id="file">
                        <div id="image_show">
                            <img src="../<?php print $rowpro[6]?>" width="100px" height="100px">
                        </div>
                        <input type="hidden" name="fileold" id="fileold" value="<?php print $rowpro[6]?>">
                    </div>
                  
                    <!--<div class="col-12">-->
                    <!--    <div class="form-check">-->
                    <!--        <input class="form-check-input" type="checkbox" id="gridCheck">-->
                    <!--        <label class="form-check-label" for="gridCheck">-->
                    <!--        Check me out-->
                    <!--        </label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Câp nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
    error_reporting(0);
    if (isset($_POST["submit"]) && isset($_FILES['file']) && isset($_POST["name"]) && isset($_POST["suplier_id"]) && isset($_POST["color"]) &&
    isset($_POST["cate_id"]) &&isset($_POST["quantity"]) &&isset($_POST["price"]) &&isset($_POST["size"]) && isset($_POST["description"])
    && isset($_POST["fileold"])) {
        $name = $_POST["name"];
        $suplier_id = $_POST["suplier_id"];
        $cate_id = $_POST["cate_id"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $size = $_POST["size"];
        $updated_at = date("Y-m-d");
        $description = $_POST["description"];
        $color = $_POST["color"];
        $fileold = $_POST["fileold"];
        require('../class/products.php');
        $product = new products();
        $productDetail = new products();
        $resultproduct = products::getByName($name);
        echo $_FILES['file'];
        echo $fileold;
        if($resultproduct->num_rows == 1){
            echo " Tên sản phẩm đã tồn tại";
        }
        if($_FILES['file'] == ''){
            
        }
        else {
            if ($_FILES['file']['error'] > 0)
                $img = $_POST["fileold"];
            if(file_exists('../images/t-shirt/' . $_FILES['file']['name']))
                echo $_FILES['file']['name']."  Đã tồn tại";
            else{
                move_uploaded_file($_FILES['file']['tmp_name'], '../images/t-shirt/' . $_FILES['file']['name']);
                $img = $_FILES['file']['name'];
            }
            $product->set(NULL, $name, $cate_id, $suplier_id, $price, $quantity, $img, $description, $rowpro[8], $updated_at);
            $rsadd = products::update($product);
            if($rsadd == 1){
                $productDetail->setDetail($id, $size, $color, '', $rowpro[6], $updated_at);
                $rsdetail = products::updateDetail($productDetail);
                if($rsdetail == 1){
                    echo "<script type='text/javascript'>alert('Cập nhật sản phẩm thành công.');</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Cập nhật chi tiết sản phẩm không thành công.');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Cập nhật sản phẩm không thành công.');</script>";
            }
        }
    }
   ?>



