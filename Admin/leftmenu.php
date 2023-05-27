<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?act=stat" class="brand-link centered ml-2">
        <span class="brand-text font-weight-light font-weight-bolder">Trang quản lý</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info" id="user">
                    <span class="username">
                    <?php
                    $username = $_SESSION['name'];
                    $id = $_SESSION['id'];
                    $role = $_SESSION['role'];
                    if($username){
                        echo "<a class='btn btn-outline-info' href='index.php?act=detail_user&id=$id'>
                            <i class='fas fa-user'></i>    $username
                            </a>
                        ";
                    }
                    ?>
                    </span>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                
                <li class="nav-item">
                    <a href="index.php?act=stat" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Thống kê
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Sản phẩm
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?act=list_product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Đơn hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?act=list_order_wait" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng chờ xác nhận</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=list_order_new" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng đang giao</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=list_order_done" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng đã giao</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=list_order_canceled" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng bị hủy</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                if($role==1){
                    echo "<li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-tachometer-alt'></i>
                        <p>
                           Danh mục
                            <i class='right fas fa-angle-left'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='index.php?act=add_category' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Thêm danh mục</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='index.php?act=list_category' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-user'></i>
                        <p>
                            Tài khoản
                            <i class='right fas fa-angle-left'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                    <li class='nav-item'>
                            <a href='index.php?act=add_user' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Thêm tài khoản</p>
                            </a>
                        </li>

                        <li class='nav-item'>
                            <a href='index.php?act=list_user&role=3' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Quản lý kho</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='index.php?act=list_user&role=2' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Nhân viên bán hàng</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='index.php?act=list_user&role=4' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Khách hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-copy'></i>
                        <p>
                            Kho hàng
                            <i class='fas fa-angle-left right'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='index.php?act=add_stock' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Thêm kho hàng</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='index.php?act=list_stock' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Danh sách kho hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-copy'></i>
                        <p>
                            Nhà cung cấp
                            <i class='fas fa-angle-left right'></i>
                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='index.php?act=add_supplier' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Thêm nhà cung cấp</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='index.php?act=list_supplier' class='nav-link'>
                                <i class='far fa-circle nav-icon'></i>
                                <p>Danh sách nhà cung cấp</p>
                            </a>
                        </li>
                    </ul>
                </li>";
                }              
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Nhập kho
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?act=add_product" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhập sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=list_product_over" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sản phẩm đã hết</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=list_invoice_in" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách hóa đơn nhập</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <script type='text/javascript'>
   
        function userdetail(id){
            var url = "user_detail/"+id;
            $('.modal-body').empty();
           $.ajax({
            datatype: 'JSON',
            url: url,
               success: function(response){
                    $('.modal-body').html(response.html);
                    // Display Modal
                    $('#empModal').modal('show');               }
           });
    }
   </script>
</aside>
