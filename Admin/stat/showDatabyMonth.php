<?php 
	
	require_once('../class/connectDB.php');
	 if (isset($_POST['submit'], $_POST['month_pick'])) {

                         $month = $_POST['month_pick'];

            $total_order = orders::getOrderTotalbyMonth($month);
            $order_done = orders::getOrderDonebyMonth($month);
            $order_wait = orders::getOrderWaitbyMonth($month);


            $output = '
            	<div class="row">
			<div class="col-lg-3 col-6">
		            <!-- small box -->
		            <div class="small-box bg-info">
		              <div class="inner">
		                <h3>'.$total_order.'</h3>

		                <p>New Orders</p>
		              </div>
		              <div class="icon">
		                <i class="ion ion-bag"></i>
		              </div>
		              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		            </div>
		          </div>
		          <!-- ./col -->
		          <div class="col-lg-3 col-6">
		            <!-- small box -->
		            <div class="small-box bg-success">
		              <div class="inner">
		                <h3>'. $order_done .'<sup style="font-size: 20px"></sup></h3>

		                <p>Order done</p>
		              </div>
		              <div class="icon">
		                <i class="ion ion-stats-bars"></i>
		              </div>
		              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		            </div>
		          </div>
		          <!-- ./col -->
		          <div class="col-lg-3 col-6">
		            <!-- small box -->
		            <div class="small-box bg-warning">
		              <div class="inner">
		                <h3>'. $order_wait .'</h3>

		                <p>Order wait</p>
		              </div>
		              <div class="icon">
		                <i class="ion ion-person-add"></i>
		              </div>
		              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		            </div>
		          </div>
		          <!-- ./col -->
		       
		        </div>
            ';

            echo $output;
     }
    
?>