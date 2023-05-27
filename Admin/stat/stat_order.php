<?php 
    include('../class/connectDB.php');

          
         $output = '';
         $query = "  
         SELECT SUM(orders.id) as total_order
			FROM orders
			WHERE MONTH(orders.updated_at) =  MONTH(CURRENT_DATE - INTERVAL 1 MONTH);
         ";  
    

         $conn = connectDB::connect("root", "");
         $result = mysqli_query($conn, $query);
         ?>


<!DOCTYPE html>  
 <html>  
      <head>  
           <title>HENTAIZ.NET</title>  
           <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
			<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>



      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
               <br />  

            <div class="col-md-6">
          	   	<input type="text" class="form-control" name="month_pick" id="month_pick" />
         	</div>

             <div class="col-md-3">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
             </div>  


                <div style="clear:both"></div>                 
                <br />  
				</div>

               <div id="content">
               		 <?php
					         $output .= '  
					              <h1>Tổng đơn hàng trong tháng này là:</h1>
					         ';  

					         if(mysqli_num_rows($result) >= 1)  
					         {  
					              while($row = mysqli_fetch_array($result))  
					              {  

					                   $output .= '  
					                         <h1> '.number_format($row["total_order"]).' đơn</h1>
					                   ';  
					              }  
					         }  
					         else  
					         {  
					              $output .= '  
					                   <div>  
					                        <h1 ><center>Chưa có đơn hàng nào trong tháng này</center></h1>  
					                   <div>  
					              ';  
					         }  
					           
					         echo $output;  
					    
					?>
               </div>

                  
           </div>  
      </body>  
 </html>  



 <script>  
    

     //from date to date
 	$(document).ready(function(){  
     var dp=$("#month_pick").datepicker( {
		    format: "mm-yyyy",
		    startView: "months", 
		    minViewMode: "months"
		});

		dp.on('changeMonth', function (e) {    
		   //do something here
		   alert("Month changed");
		});

		$(function(){
		  $("#month_pick").datepicker();  
		});

		$('#filter').click(function(){  
                var month_pick = $('#month_pick').val();  
                
                if(month_pick != '')  
                {  
                     $.ajax({  
                          url:"stat_order.php",  
                          method:"POST",  
                          data:{month_pick},  
                          success:function(data)  
                          {  
                               $('#content').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  

	});

 </script>