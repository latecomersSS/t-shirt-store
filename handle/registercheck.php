<?php
 session_start();
   if(isset($_GET['submit']) && isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["phone"]) && isset($_GET["password"]) ){

      require('../class/users.php');
      $user = new users();
      $name = $_GET["firstname"]; 
      $email = $_GET["email"];
      $phone = $_GET["phone"];
      $pass = $_GET["password"];
      $active = 1;
      $created_at = date("Y-m-d");
      $updated_at = date("Y-m-d");
      $user->set(NULL, $name, $email, $phone, $password, 1, 4, $created_at, $updated_at);

       
       $result = users::add($user);
       if($result == 1){
        echo '<script>
        if(confirm("Tạo tài khoản thành công")){
                window.location="../index.php?act=login";
            }
        </script>';
      } else {        
         echo '<script>
         if(confirm("Tạo tài khoản không thành công!")){
             window.location="../index.php?act=register";
         }
         </script>';
      
            }
      
   }  else {
      echo $_GET['name'];
     echo "không nhận đủ";
   }
?>