<?php
if(isset($_GET['act']) && isset($_GET['id'])){
    $id = $_GET['id'];
    require("../class/users.php");
    $rsuser = users::getByID($id); 
    $rowuser = $rsuser->fetch_array();

    $userrole = new users();
    $rsrole = $userrole->getRoles();
}

?>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Cập nhật tài khoản
            </div>
            <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="inputName4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName4" name="name" placeholder="Nhập tên người dùng" value="<?php print $rowuser[1]?>">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email" value="<?php print $rowuser[2]?>">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" value="<?php print $rowuser[4]?>">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại người dùng" value="<?php print $rowuser[3]?>">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="role_id" class="form-label">Role</label>
                        <select id="role_id" class="form-select" name="role_id">
                            <?php
                            while( $rowrole=$rsrole->fetch_array()){
                                echo "<option value='$rowrole[0]'> $rowrole[1] </option>";
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
    if (isset($_POST["submit"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["active"]) && isset($_POST["role_id"])
    && isset($_POST["password"]) && isset($_POST["phone"])) {

        $name = $_POST["name"];
        $email= $_POST["email"];
        $active = $_POST["active"];
        $role_id = $_POST["role_id"];
        $password= $_POST["password"];
        $phone= $_POST["phone"];
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
        $newuser = new users();
        $newuser->set($id, $name, $email, $phone, $password, $active, $role_id, $rowuser[7], $updated_at);
        $rsemail = users::getByEmail($email);
        if($rsemail->num_rows == 1){
            echo "<script type='text/javascript'>alert('Email đã tồn tại.');</script>";
        } else {
            $update = users::update($newuser);
            if($update == 1){
                $updaterole = users::updateRole($id, $role_id);
                if($updaterole == 1){
                    echo "<script type='text/javascript'>alert('Cập nhật người dùng thành công.');</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Cập nhật quyền không thành công.');</script>";
                }              
            } else {
                echo "<script type='text/javascript'>alert('Cập nhật người dùng không thành công !!!');</script>";
            }
        } 
    }
   ?>



