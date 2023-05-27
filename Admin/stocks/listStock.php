<main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách kho hàng
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Updated</th>
                                            <th>Active</th>
                                            <th width="20px">Edit</th>
                                            <th width="20px">Delete</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        require('../class/stocks.php');
                                        $stocks = new stocks();

                                        $result = $stocks->getAll();

                                        while( $row = $result->fetch_array()){
                                            $active = $row[5] == 0 ? 'No' : 'Yes';
                                            echo "<tr>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td>
                                                <td>$row[2]</td>
                                                <td>$row[4]</td>
                                                <td>$active</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=edit_stock&id=$row[0]'>
                                                        <i class='fa fa-edit'></i>
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
    var result=confirm("Bạn có chắc muốn xóa không ?");
    if(result){
        //alert(id.innerHTML);
        var p = id.innerHTML;
        window.location="stocks/deleteStock.php?id="+p;
    }
}

</script>