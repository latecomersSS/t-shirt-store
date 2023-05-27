<?php

//fetch_data.php
        
        $connect = new PDO("mysql:host=localhost;dbname=t-shirt", "root", "");
        require('../class/suppliers.php');
        require('../class/sizes.php');
        require('../class/colors.php');        
        $brandname = new suppliers();
        $colorname = new colors();
        $sizesymbol = new sizes();
        if(isset($_POST["action"]))
        {
          $cate = var_export(implode("", $_POST["cate"]), true);
         $query = "
              SELECT * FROM products p INNER JOIN product_details ON p.id = product_details.pro_id WHERE p.cate_id = ".$cate."
             ";
             if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
             {
                  $query .= "
                   AND p.price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
                  ";
             }
             if(isset($_POST["brand"]))
             {

                  $brand_filter = implode("','", $_POST["brand"]);
                  $query .= "
                   AND p.supplier_id IN('".$brand_filter."') 
                  ";
            }

             if(isset($_POST["color"]))
             {
                  $color_filter = implode("','", $_POST["color"]);
                  $query .= "
                   AND product_details.color IN('".$color_filter."')
                  ";
             }
             if(isset($_POST["storage"]))
             {
                  $size_filter = implode("','", $_POST["storage"]);
                  $query .= "
                   AND product_details.size IN('".$size_filter."')
                  ";
             }
             if(isset($_POST["search"]))
             {

                  $search_filter = implode("','", $_POST["search"]);
                  $query .= "
                   AND p.name LIKE('".$search_filter."') 
                  ";
            }

        $query .="GROUP BY p.id";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_row = $statement->rowCount();
         $output = '';
         $output1 = '';
         if($total_row > 0)
         {
          foreach($result as $row)
          {
            $rowBrand = $brandname -> getNameById($row[3]);
            $rowColor = $colorname -> getNamebyID($row[12]);
            $rowSize = $sizesymbol -> getNamebyID($row[11]);
            $price = number_format($row[4], 0);

          $output1 .= "<div onclick='' class='product-grid fade'>
     	 				<div class='product-grid-head'>
     	 					<div class='block'>
     	 						<div class='starbox small ghosting'> </div> <span> $row[5]</span>
     	 					</div>
     	 				</div>
     	 				<div class='product-pic'>
     	 					<a href='#'><img src='images/product5.jpg' title='$row[1]' /></a>
     	 					<p>
     	 					<a href='#'><small>$row[1]</small></a>
     	 					<span>$rowBrand</span>
     	 					</p>
     	 				</div>
     	 				<div class='product-info'>
     	 					<div class='product-info-cust'>
     	 						<a href='index.php?act=detail&id=$row[0]'>Details</a>
     	 					</div>
     	 					<div class='product-info-price'>
     	 						<a href='index.php?act=detail&id=$row[0]'>$row[4] VNĐ</a>
     	 					</div>
     	 					<div class='clear'> </div>
     	 				</div>
     	 				<div class='more-product-info'>
     	 					<span> </span>
     	 				</div>
     	 		</div>";

           $output .= "
           <div class='col-sm-4 col-lg-4 col-md-4'>
               <div style='border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:380px;'>
                    <img src='$row[6]' alt='' width='100%' height='280px'>
                    <p><strong><a href='index.php?act=detail&id=$row[0]'>$row[1]</a></strong></p>
                    <div class='row' style='padding-left:16px;'>
                         <div class='col-md-5' style='background-color:#93D52D; padding: 0.5em 1em; text-align: center;'>
                              <a href='index.php?act=detail&id=$row[0]'>Details</a>
                         </div>
                         <div class='col-md-7'> <h5 class='text-danger'>$price VND</h5></div>
                    </div>
                   
               </div>
           </div>
           ";
          }
         }
         else
         {
          $output = '<h3>No Data Found</h3>';
          $output1 = '<h3>No Data Found</h3>';
         }
         echo $output;
        }

?>