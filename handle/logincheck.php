<?php 
session_start();
    if (isset($_POST['email']) && isset($_POST['password']))
    {
        $conn = mysqli_connect('127.0.0.1','root','','t-shirt');

        $email = $_POST["email"];
        $pass = $_POST["password"];

        if (!$email || !$pass){
            echo '<script>
            if(confirm("Vui lòng nhập đầy đủ thông tin đăng nhập")){
                    window.location="../index.php?act=login";
                }
            </script>';
            exit;
        }
        $sql = "SELECT * FROM users WHERE users.Password='{$pass}' AND users.Email='{$email}'";

        $result = $conn->query($sql);
        if(mysqli_num_rows($result) == 1){
            $_SESSION['email'] = $email;
            $row=$result->fetch_array();
            $_SESSION['name'] = $row[1];
            $_SESSION['id'] = $row[0];
            $userid=$row[0];
            require('../class/orders.php');
            $order_id = orders::getIdOrderNew($row[0]);
            if($order_id > 0){
                $_SESSION['order_id'] = $order_id;
            }
            $sql1 = "SELECT role_id FROM user_roles WHERE user_id=$userid";
            $rsrole = $conn->query($sql1);
            $row1 = $rsrole->fetch_array();
            $role = $row1[0];
            $_SESSION['role'] = $role;
            if($role == 4){               
                header("Location: ../index.php");
            }else{
                echo "<script type='text/javascript'>alert($row[1]);</script>";
                header("Location: ../admin/index.php");             
            }
        }
        else{
           
            echo '<script>
            if(confirm("Tên đăng nhập hoặc mật khẩu không chính xác!")){
                window.location="../index.php?act=login";
            }
            </script>';
        }
        $conn->close();
    } 
?>