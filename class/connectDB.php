<?php
    class connectDB{
    public static function connect($username, $password){
        $conn = new mysqli("127.0.0.1", $username, $password, "t-shirt");
        return $conn;
    }
}
?>