
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách đơn hàng đang giao
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Updated</th>
                                            <th>Total</th>                                            
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                        require('../class/orders.php');
                                        
                                        $orders = new orders();
                                        $result = $orders->getListOrderNew();

                                        while( $row = $result->fetch_array()){
                                            $total = number_format($row[6], 0);  
                                            
                                            echo "<tr>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td>
                                                <td>$row[2]</td>
                                                <td>$row[3]</td>
                                                <td>$row[4]</td>
                                                <td>$total</td>
                                                <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=detail_order&id=$row[0]'>
                                                        <i class='fa fa-info-circle'></i>
                                                    </a>
                                                </td>
                                            </tr>";
                                        }
                                      ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
</script>