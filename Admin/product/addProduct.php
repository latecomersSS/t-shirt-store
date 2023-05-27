<main>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Thêm sản phẩm mới
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data" name="addProduct" onsubmit="return addProductForm()">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
                    </div>

                    <div class="col-md-6">
                        <label for="inputSupplier" class="form-label">Supplier</label>
                        <select id="inputSuplier" class="form-control" name="suplier_id">
                            <option selected>Choose...</option>
                                <?php 
                                    //require_once("D:\\xampp\\htdocs\\t-shirt-store\\class\\suppliers.php");
                                    require('../class/suppliers.php');
                                    $supplier = new suppliers();
                                    $result = $supplier -> getAll();
                                    while( $row = $result ->fetch_array()){
                                        echo "<option value='$row[0]'> $row[1] </option>";
                                    }
                                ?>
                            
                        </select>
                    </div>
     
                    <div class="col-md-6">
                        <label for="inputCate" class="form-label">Category</label>
                    
                        <select id="inputCate" class="form-select" name="cate_id">
                            <option selected>Choose...</option>
                                <?php
                                    //require_once("D:\\xampp\\htdocs\\t-shirt-store\\class\\categories.php");
                                    require('../class/categories.php');
                                    $cate = new categories();
                                    $result = $cate->getAll();
                                    while($row = $result->fetch_array()){
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                                ?>
                            <option>...</option>
                        </select>
                    </div>
     
                    <div class="col-12">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="col-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="col-6">
                        <label for="saleprice" class="form-label">Sale Price</label>
                        <input type="text" class="form-control" id="saleprice" name="saleprice">
                    </div>
     
                    <div class="col-6">
                        <label for="inputSize2" class="form-label">Size</label>
                        <select id="inputSize" class="form-select" name="size">
                            <option selected>Choose...</option>
                            <?php
                                    require('../class/sizes.php');
                                    $size = new sizes();
                                    $result = $size->getAll();
                                    while($row = $result->fetch_array()){
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                            ?>
                        </select>
                    </div>
     
                    <div class="col-6">
                        <label for="inputColor2" class="form-label">Color</label>
                        <select id="inputColor" class="form-select" name="color">
                            <option selected>Choose...</option>
                            <?php
                                    require('../class/colors.php');
                                    $color = new colors();
                                    $result = $color->getAll();
                                    while($row = $result->fetch_array()){
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                            ?>
                        </select>
                    </div>
     
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="inputImg" class="form-label">Image</label>
                        <input type="file" name="file" class="form-control" id="file">
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
                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
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
    && isset($_POST["saleprice"])) {

        $name = $_POST["name"];
        $suplier_id = $_POST["suplier_id"];
        $cate_id = $_POST["cate_id"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $saleprice = $_POST["saleprice"];
        $size = $_POST["size"];
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
        $description = $_POST["description"];
        $color = $_POST["color"];
        $user_id = $_SESSION["id"];
        require('../class/products.php');
        require('../class/invoices_in.php');
        $product = new products();
        $productDetail = new products();
        $rsproduct = products::getByName($name);
        $img = "images/t-shirt/";
        // Nếu sản phẩm đã tồn tại
        if($rsproduct->num_rows == 1){
            $pro = $rsproduct->fetch_array();
            $invoice = new invoices_in();
            $invoice->set(NULL, $user_id, $pro[0], $quantity, $created_at, $price);
            $addinv = invoices_in::add($invoice);
            if($addinv == 1){
                $rsaddqtt = products::addQuantityPro($pro[0], $quantity);
                if($rsaddqtt == 1){
                    echo "<script type='text/javascript'>alert('Cập nhật số lượng sản phẩm thành công.');</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Cập nhật số lượng sản phẩm không thành công.');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Thêm hóa đơn nhập không thành công.');</script>";
            }          
        }
        // Nếu thêm sản phẩm mới
        else {
            if ($_FILES['file']['error'] > 0)
                echo "Upload hình ảnh không thành công!";
            else if(file_exists('../images/t-shirt/' . $_FILES['file']['name']))
                echo $_FILES['file']['name']."  Đã tồn tại";
            else{
                move_uploaded_file($_FILES['file']['tmp_name'], '../images/t-shirt/' . $_FILES['file']['name']);
                $img .= $_FILES['file']['name'];
                $product->set(NULL, $name, $cate_id, $suplier_id, $saleprice, $quantity, $img, $description, $created_at, $updated_at);
                $rsadd = products::add($product);
                if($rsadd == 1){
                    $id = products::getIdByName($name);
                    $productDetail->setDetail($id, $size, $color, '', $created_at, $updated_at);
                    $rsdetail = products::addDetail($productDetail);
                    if($rsdetail == 1){
                        $invoice = new invoices_in();
                        $invoice->set(NULL, $user_id, $id, $quantity, $created_at, $price);
                        $addinv = invoices_in::add($invoice);
                        if($addinv == 1){
                            echo "<script type='text/javascript'>alert('Nhập sản phẩm thành công.');</script>";
                        }else{
                            echo "<script type='text/javascript'>alert('Thêm hóa đơn nhập không thành công.');</script>";
                        }
                    }else{
                        echo "<script type='text/javascript'>alert('Thêm chi tiết sản phẩm không thành công.');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('Thêm sản phẩm không thành công.');</script>";
                }
                              
            }
        }
    }
   ?>




                




