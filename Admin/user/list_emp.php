
<?php
if(isset($_GET['act']) && isset($_GET['role'])){
    $role = $_GET['role'];
    require("../class/users.php");
    $rsuser = users::getUserByRole($role); 

}
?>
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
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Password</th>
                                            <th>Active</th>
                                            <th>Updated</th>
                                            <th width="20px">Edit</th>
                                            <th width="20px">Delete</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        while( $row = $rsuser->fetch_array()){
                                            $active = $row[5] == 0 ? 'No' : 'Yes';
                                            echo "<tr>
                                                <td>$row[5]</td>
                                                <td>$row[6]</td>
                                                <td>$row[7]</td>
                                                <td>$row[8]</td>
                                                <td>$row[9]</td>
                                                <td>$active</td>
                                                <td>$row[13]</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=edit_user&id=$row[5]'>
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
        window.location="user/deleteUser.php?id="+p;
    }
}

</script>