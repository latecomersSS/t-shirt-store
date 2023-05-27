<?php
    require('../class/products.php');
    require('../class/categories.php');
    require('../class/suppliers.php');
    
    $product = new products();
    $cateName ='';
    $supName = '';
    
    $result = $product->getProductOver();
?>

<main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách sản phẩm
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Supplier</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Image</th>

                                            <th>Updated</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        //require 'D:\\xampp\\htdocs\\t-shirt-store\\class\\products.php';
                                        if($result->num_rows > 0){
                                            while( $row = $result->fetch_array()){
                                                $cateName = categories::getNameById($row[2]);
                                                $supName = suppliers::getNameById($row[3]);
    
                                                echo "<tr>
                                                    <td>$row[0]</td>
                                                    <td>$row[1]</td>
                                                    <td>$cateName</td>
                                                    <td>$supName</td>
                                                    <td>$row[4]</td>
                                                    <td>$row[5]</td>
                                                    <td><img width='20px' height='20px' src='$row[6]'></td>
                                                    <td>$row[9]</td>
                                                    <td>
                                                        <a class='btn btn-primary btn-sm' href='index.php?act=detail_product&id=$row[0]'>
                                                            <i class='fa fa-info-circle'></i>
                                                        </a>
                                                    </td>
                                                </tr>";
                                            }
                                        }else{
                                            echo "<tr class=''>Không có sản phẩm hết hàng</tr>";
                                        }                            
                                      ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                </main>
