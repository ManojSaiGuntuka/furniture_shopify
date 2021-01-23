
<?php session_start(); ?>
<?php
$_SESSION['userId'] = null;
 $_SESSION['username'] = null; 
 $_SESSION['user_password'] = null;
 $_SESSION['user_role'] = null;

 header("Location:./index.php");

?>