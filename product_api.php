
<?php


$shopify = $_GET;
//echo print_r($shopify);

$sql = "SELECT * FROM shopifybd WHERE store_url ='" .$shopify['shop'] . "' LIMIT 1";
$result = mysqli_query($conn, $sql);

if(mysql_num_rows($result) < 1) {
 header("Location: install.php?shop =" . $shopify['shop']);
	exit();
 }else{
 	// $shop_row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$store_url = $shopify['shop'];
$token = $shop_row['access_token'];
echo store_url '<br>';
echo token '<br>';
}
 ?>
