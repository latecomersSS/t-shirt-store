
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách danh mục
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Stock</th>
                                            <th>Updated</th>
                                            <th>Active</th>
                                            <th width="20px">Edit</th>
                                            <th width="20px">Delete</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        require('../class/categories.php');
                                        require('../class/stocks.php');
                                        $category = new categories();
                                        $result = $category->getAll();

                                        while( $row = $result->fetch_array()){
                                            $active = $row[6] == 0 ? 'No' : 'Yes';
                                            $stock = stocks::getByID($row[3]);
                                            $rstock = $stock->fetch_array();
                                            echo "<tr>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td>
                                                <td>$row[2]</td>
                                                <td>$rstock[1]</td>
                                                <td>$row[5]</td>
                                                <td>$active</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=edit_category&id=$row[0]'>
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
        window.location="Category/deleteCategory.php?id="+p;
    }
}

</script>