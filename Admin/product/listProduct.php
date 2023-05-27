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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Supplier</th>
                                            <th>Price(VND)</th>
                                            <th>Quantity</th>

                                            <th>Updated</th>
                                            <th>Edit</th>
                                            <th>Detail</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        //require 'D:\\xampp\\htdocs\\t-shirt-store\\class\\products.php';
                                        require('../class/products.php');
                                        require('../class/categories.php');
                                        require('../class/suppliers.php');
                                        
                                        $product = new products();
                                        $cateName ='';
                                        $supName = '';

                                        $result = $product->getAll();

                                        while( $row = $result->fetch_array()){
                                            $cateName = categories::getNameById($row[2]);
                                            $supName = suppliers::getNameById($row[3]);
                                            $price = number_format($row[4], 0);

                                            echo "<tr>
                                                <td>$row[0]</td>
                                                <td><img width='60px' height=50px' src='../$row[6]'></td>
                                                <td>$row[1]</td>
                                                <td>$cateName</td>
                                                <td>$supName</td>
                                                <td>$price</td>
                                                <td>$row[5]</td>
                                                
                                                <td>$row[9]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=edit_product&id=$row[0]'>
                                                        <i class='fa fa-edit'></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=detail_product&id=$row[0]'>
                                                        <i class='fa fa-info-circle'></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class='btn btn-danger btn-sm' onclick='delpro(this)'>
                                                        <i class='fa fa-trash'></i>
                                                    </a>
                                                </td>
                                            </tr>";
                                        }
                                      ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                </main>

<script>
function delpro(row){
    var table = document.getElementById("example1");
    var i = row.parentNode.parentNode.rowIndex;
    var row = table.rows[i];
    var id = row.cells[0];
    var result=confirm("Bạn có chắc muốn xóa sản phẩm này không ?");
    if(result){
        //alert(id.innerHTML);
        var p = id.innerHTML;
        window.location="product/deleteProduct.php?id="+p;
    }
}
</script>