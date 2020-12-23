
<?php session_start(); ?>
<?php
$_SESSION['adminId'] = null;
 $_SESSION['adminName'] = null; 
 $_SESSION['password'] = null;
 $_SESSION['user_role'] = null;

 header("Location:index.php");

?>