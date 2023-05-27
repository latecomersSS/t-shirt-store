<?php
  
   if(isset($_POST["nameCate"]) && isset($_POST["mota"])){
       
       $name = $_POST["nameCate"];
       $mota = $_POST["mota"];
      require('../class/category.php');
      $category = new category();
       $randomid = (rand(10,1000000));
       $conn = mysqli_connect('localhost' , 'root' , '' , 'market');
       $sql = "SELECT * FROM category WHERE category.Name='{$name}'";
       $result = mysqli_query($conn,$sql);
       if (mysqli_num_rows($result) == 1){
        echo '<script>
        if(confirm("Category đã tồn tại")){
                window.location="index.php";
            }
        </script>';
       }
       else{
         $category->setCate($randomid,$name,$mota);
            $result = category::add($category);
            if($result == 1){
               header ( "Location: index.php");

            }
            else{
            echo "Thất bại";
         }
      }
    }
      
   
   
?>


