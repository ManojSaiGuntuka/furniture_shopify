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
$shop ="clickrippleapp";



$sql = "SELECT * FROM shopifybd WHERE store_url ='" .$requests['shop'] . "' LIMIT 1";
$result = mysqli_query($conn, $sql);


$row = mysqli_fetch_assoc($result);
$shop_url = $requests['shop'];
//echo $row['store_url'];
//echo $row['access_token'];
//}
 
 ?>