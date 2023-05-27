<?php
                require('../class/orders.php');
                                                    
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
                                Chi tiết doanh thu tháng <?php echo $month?>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php 
                                    error_reporting(0);
                                            $result = $orders->getDetailRevenuebyMonth($month);
                                            while( $row = $result->fetch_array()){
                                                $sum += $row[4];
                                                $price_format = number_format($row[3]);
                                                $total_price = number_format($row[4]);
                                                echo "<tr>
                                                        <td>$row[0]</td>
                                                        <td>$row[1]</td>
                                                        <td>$row[2]</td>
                                                        <td>$price_format</td>
                                                        <td>$total_price</td>
                                                      </tr>";
                                            }
                                       
                                        }
                                      ?>
                        </tbody>
                        <tfoot>
                                <tr>
                                    <td class="right" colspan="4">Total: </td><td class="right"><?php echo number_format($sum) ?> VNĐ</td>
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

