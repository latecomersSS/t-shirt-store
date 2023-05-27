
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách hóa dơn nhập
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employee</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Created</th>
                                            <th width="20px">Info</th>
                                            <th width="20px">Delete</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        require('../class/invoices_in.php');
                                        require('../class/users.php');
                                        require('../class/products.php');
                                        $invoice = new invoices_in();
                                        $result = $invoice->getAll();

                                        while( $row = $result->fetch_array()){
                                            $pro = products::getNameByID($row[1]);
                                            $user = users::getNameByID($row[0]);
                                            echo "<tr>
                                                <td>$row[5]</td>
                                                <td>$user</td>
                                                <td>$pro</td>
                                                <td>$row[2]</td>
                                                <td>$row[4]</td>
                                                <td>$row[3]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=edit_category&id=$row[5]'>
                                                        <i class='fa fa-info'></i>
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

<script>
function delpro(row){
    var table = document.getElementById("example1");
    var i = row.parentNode.parentNode.rowIndex;
    var row = table.rows[i];
    var id = row.cells[0];
    var result=confirm("Bạn có chắc muốn xóa không ?");
    if(result){
        //alert(id.innerHTML);
        var p = id.innerHTML;
        window.location="invoice_in/deleteInv.php?id="+p;
    }
}

</script>