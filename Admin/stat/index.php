<main>                
          <div class="col-sm-8">
             <form method="POST" >
                    <select placeholder="Month" name="month_pick" id="month_pick">
                      <option  style="display:none;">Choose month</option>
                      <option name="January" value="1">January</option>
                      <option name="February" value="2">February</option>
                      <option name="March" value="3">March</option>
                      <option name="April" value="4">April</option>
                      <option name="May" value="5">May</option>
                      <option name="June" value="6">June</option>
                      <option name="July" value="7">July</option>
                      <option name="August" value="8">August</option>
                      <option name="September" value="9">September</option>
                      <option name="October" value="10">October</option>
                      <option name="November" value="11">November</option>
                      <option name="December" value="12">December</option>
                    </select>
               <input type="submit" id="submit" name="submit">
          </form>
        </div>
        <div style="clear:both"></div>                 

          <?php 
                    require '../class/orders.php';
                    require '../class/users.php';
                    if (isset($_POST['submit'], $_POST['month_pick'])) {

                         $month = $_POST['month_pick'];
                    }
                    else{
                         $month = date('m');
           
                     }
                      $total_order = orders::getOrderTotalbyMonth($month);
                      $order_done = orders::getTotalOrderDonebyMonth($month);
                      $order_wait = orders::getTotalOrderWaitbyMonth($month);  
                      $total_revenue = orders::getTotalPricebyMonth($month);
          ?>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_order ?></h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?act=listOrder&month=<?php echo $month?>" type class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $order_done?><sup style="font-size: 20px"></sup></h3>

                <p>Order done</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index.php?act=listOrderDone&month=<?php echo $month?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $order_wait?></h3>

                <p>Order wait</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="index.php?act=listOrderWait&month=<?php echo $month?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format($total_revenue) ?> VNĐ<sup style="font-size: 20px"></sup></h3>

                <p>Total Revenue</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index.php?act=detailRevenue&month=<?php echo $month?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
    </div>
<div class="card mb-4">
      <div class="card-header">
          <i class="fas fa-table me-1"></i>
           Danh sách tất cả đơn trong tháng <?php echo $month ?> 
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
                                      $orders = new orders();
                                      if (isset($_POST['submit'], $_POST['month_pick'])) {
                                            $result = $orders->getAllbyMonth($month);

                                            while( $row = $result->fetch_array()){
                                                $total_price = orders::getTotalPricebyOrderID($row[0], $month);
                                                $customer = users::getNameByID($row[9]);
                                                $total_format = number_format($total_price_current);
                                        
                                            
                                            echo "<tr>
                                                  <td>$row[0]</td>
                                                  <td>$customer</td>
                                                  <td>$row[2]</td>
                                                  <td>$row[3]</td>
                                                  <td>$row[4]</td>
                                                  <td>$total_format</td>
                                                  <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=detail_order&id=$row[0]'>
                                                        <i class='fa fa-info-circle'></i>
                                                    </a>
                                                </td>
                                                </tr>";
                                        }
                                      }
                                      else{
                                        $month = date('m');
                                        $resultELSE = $orders->getAllbyMonth($month);
                                       
                                            while( $rowELSE = $resultELSE->fetch_array()){
                                                $total_price_current = orders::getTotalPricebyOrderID($rowELSE[0], $month);
                                                $customerELSE = users::getNameByID($rowELSE[9]);
                                                $total_format_ELSE = number_format($total_price_current);
                                            
                                            echo "<tr>
                                                  <td>$rowELSE[0]</td>
                                                  <td>$customerELSE</td>
                                                  <td>$rowELSE[2]</td>
                                                  <td>$rowELSE[3]</td>
                                                  <td>$rowELSE[4]</td>
                                                  <td>$total_format_ELSE</td>
                                                  <td>
                                                    <a class='btn btn-primary btn-sm' href='index.php?act=detail_order&id=$rowELSE[0]'>
                                                        <i class='fa fa-info-circle'></i>
                                                    </a>
                                                </td>
                                                </tr>";
                                        }

                                      }
                                    ?>
                </tbody>
               </table>
          </div>
       </div>

    
  </main>
 
 <!--<script>
      
       $(document).ready(function(){  

          $('#submit').click(function(){  
                var month_pick = $('#month_pick').val();  
                if(month_pick != '')  
                {  
                     $.ajax({  
                          url:"showDatabyMonth.php",  
                          method:"POST",  
                          data:{month_pick:month_pick},  
                          success:function(data)  
                          {  
                               $('#content').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Month");  
                }  
           });  
       });
 </script>-->