<?php 
    include('../class/connectDB.php');
    if(isset( $_POST["from_date"], $_POST["to_date"]))  
    {   

          $from_date = $_POST['from_date'];
          $to_date = $_POST['to_date'];

          
         $output = '';
         $query = "  
          SELECT  SUM(order_details.quantity*products.price) as total_sales
          FROM order_details, products
          WHERE order_details.product_id=products.id AND DATE(order_details.updated_at) BETWEEN '".$from_date."' AND '".$to_date."'
              
         ";  
     
         $from_date_format = date_format(date_create_from_format('Y-m-d', $from_date), 'd-m-Y');
         $to_date_format = date_format(date_create_from_format('Y-m-d', $to_date), 'd-m-Y');

         $conn = connectDB::connect("root", "");
         $result = mysqli_query($conn, $query);
         $output .= '  
              <h1>Doanh thu từ ngày '.$from_date_format.' đến ngày '.$to_date_format.'</h1>
         ';  
         if(mysqli_num_rows($result) >= 1)  
         {  
              while($row = mysqli_fetch_array($result))  
              {  

                   $output .= '  
                         <h1> '.number_format($row["total_sales"]).' VND</h1>
                   ';  
              }  
         }  
         else  
         {  
              $output .= '  
                   <div>  
                        <h1 ><center>Có bán được gì đâu</center></h1>  
                   <div>  
              ';  
         }  
         $output .= '</table>';  
         echo $output;  
    }  
?>