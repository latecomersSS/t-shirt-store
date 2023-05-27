        <?php
                require('../class/orders.php');
                require('../class/users.php');
                                                    
                $orders = new orders();
                $total_price = 0;
                $customer = '';

                if (isset($_GET['month'])) {

                $month = $_GET['month'];
            ?>

<main>

    <div class="row">

                    
                    <div class="col-lg-3 col-6">
                        <a href="index.php?act=stat" class="previous">&laquo; Back</a>
                        
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách đơn hàng đã giao trong tháng <?php echo $month?>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Total Price</th>
                                            
                                            <th>Customer</th>
                                            
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                            $result = $orders->getOrderDone($month);
error_reporting(0);

                                            while( $row = $result->fetch_array()){
                                                $total_price = orders::getTotalPricebyOrderID($row[0], $month);
                                                $customer = users::getNameByID($row[9]);
                                                $sum += $total_price;
                                                $total_price_format = number_format(orders::getTotalPricebyOrderID($row[0], $month));
                                                echo "<tr>
                                                        <td>$row[0]</td>
                                                        <td>$row[6]</td>
                                                        <td>$total_price_format</td>
                                                        <td>$customer</td>
                                                      </tr>";
                                            }
                                       
                                        }
                                      ?>
                        </tbody>
                         <tfoot>
                                <tr>
                                    <td class="right" colspan="3">Total: </td><td class="right"><?php echo number_format($sum) ?> VNĐ</td>
                                </tr>
                            </tfoot>
                    </table>

                </div>
            </div>
                                                          

        </div>

        
<style>
    a {
      text-decoration: none;
      display: inline-block;
      padding: 8px 16px;
    }

    a:hover {
      background-color: #ddd;
      color: black;
    }

    .previous {
      background-color: #f1f1f1;
      color: black;
    }
</style>

</main>

