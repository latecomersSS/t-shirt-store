<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
session_unset();
header("Location:../index.php?act=login");
?>