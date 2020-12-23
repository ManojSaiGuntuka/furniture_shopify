
<?php

require_once("inc/functions.php");
require_once("inc/connect.php");




//$shopify = $_GET;
//echo print_r($shopify);

$requests = $_GET;
$hmac = $_GET['hmac'];
$serializeArray = serialize($requests);
$requests = array_diff_key($requests, array('hmac' => ''));
ksort($requests);

$token ="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";
$shop ="clickrippleappfurniture";

$sql = "SELECT * FROM shopifybd WHERE store_url ='" .$requests['shop'] . "' LIMIT 1";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

echo $row['store_url'];
echo $row['access_token'];

 
 ?>
    
<!DOCTYPE html>
<html>
<head>
<?php  include "includes/header.php"; 
require_once("inc/functions.php");
include "products.php"; 

?>
<title> Shopify ClickrippleAppFurniture </title>
<link rel = "stylesheet" type = "text/css" href = "css/style.css">
</head>
<body>
   <?php  include "includes/navigation.php";
             
	?>

  <div id= form>
  <h2> Login </h2>
  <br> <br>
   
  <form method="post" action="login.php">  
  <p>
    <label>Username: </label>
	<input type="text" id="adminName" name = "adminName"/>
	</p> 
    
	<p>
    <label>Password:  </label> 
	<input type="password" id="password" name = "password"/>
	</p> 
  
  <br><br>
  <input type="submit" id="login" name = "login" value="Login">  

</form>
</hr>
<p>  Don't have an account? &nbsp;&nbsp; <a href="registration.php"> Register Now! </a></p>
</div>
</body>
</html>