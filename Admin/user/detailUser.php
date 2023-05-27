<?php
if(isset($_GET["act"]) && isset($_GET["id"])){
    $id = $_GET["id"];
    require("../class/users.php");
    $rsuser = users::getByID($id);
    $user = $rsuser->fetch_array();
}
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Chi tiết tài khoản
    </div>
    <div class="card-body m-10">
        <div class="row m-2">
                <p><b>Tên tài khoản: </b> <?php echo $user[1]?></p>
                <p><b>Số điện thoại: </b> <?php echo $user[3]?></p>
                <p><b>Email: </b> <?php echo $user[2]?></p>
                <p><b>Mật khẩu: </b> <?php echo $user[4]?></p>
                <p><b>Ngày tạo: </b> <?php echo $user[7]?></p>
        </div>
        <a class='btn btn-outline-danger ml-3' href='../handle/logout.php'>
            Đăng xuất
        </a>
    </div>
</div>
            