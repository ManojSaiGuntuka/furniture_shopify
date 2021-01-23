<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>
<?php  include "includes/admin_header.php" ?>
    <div id="wrapper">

       <?php  include "includes/admin_navigation.php" ?>
            <!-- /.navbar-collapse -->        

        
<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Add Orders					   
                           
                        </h1>
<?php 
if(isset($_POST['create_orders'])){
//$orderID = $_POST['orderID'];
$customerID = $_POST['customerID'];
$orderDate = date['d-m-y'];
$customerName = $_POST['customerName'];
$productCode = $_POST['productCode'];
$retail_source = $_POST['retail_source'];

$quantity = $_POST['quantity'];
$price_per_item = $_POST['price_per_item'];
//$total_price = $_POST['total_price'];
$order_groupId = $_POST['order_groupId'];

$query = "INSERT INTO orders(customerID, orderDate, customerName,  productCode, retail_source, quantity, price_per_item,  order_groupId) ";
$query .= "VALUES('{$customerID}',now(),'{$customerName}','{$productCode}','{$retail_source}','{$quantity}','{$price_per_item}','{$order_groupId}' ) ";
$create_orders_query = mysqli_query($conn, $query);

if(!$create_orders_query){
die("Querry Failed" . mysqli_error($conn));
}

echo  "Orders Created: " . " " . "<a href='view_all_orders.php'> View all orders</a>";


}
?>
<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "customerID"> CustomerID </label>
<input  type="text" class= "form-control" name="customerID">
</div>
<div class= "form-group">
<label for= "customerName"> Customer Name </label>
<input  type="text" class= "form-control" name="customerName">
</div>

<div class= "form-group">
<label for= "productCode"> Product Code </label>
<input  type="text" class= "form-control" name="productCode">
</div>

<div class= "form-group">
<label for= "retail_source"> Retailer </label>
<input  type="text" class= "form-control" name="retail_source">
</div>
<div class= "form-group">
<label for= "quantity"> Quantity </label>
<input  type="text" class= "form-control" name="quantity">
</div>

<div class= "form-group">
<label for= "price_per_item"> Price per Item</label>
<input  type="text" class= "form-control" name="price_per_item">
</div>

<div class= "form-group">
<select name="order_groupId" id="">

<?php 
$query = "SELECT * FROM groups";
$select_groups = mysqli_query($conn, $query);
if(!$select_groups){
die("Querry Failed" . mysqli_error($conn));
}

while($row = mysqli_fetch_assoc($select_groups)){
$groupId = $row['groupId'];
$group_category = $row['group_category'];
     echo "<option value='$groupId'>{$group_category}</option>";								
    								
	}
?>
</select>
</div>
<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="create_orders" value="Add order">
</div>


</form>

 <div>
 <div>
 <div>
 <div>
				  
				   				   