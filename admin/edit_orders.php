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
                          Edit Orders					   
                           
                        </h1>
<?php 
if(isset($_GET['order_id'])){
    $get_order_id = $_GET['order_id'];
	}

	 $query = "SELECT * FROM orders WHERE orderID = $get_order_id ";
	 $select_order = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($select_order)) {
	$orderID = $row['orderID'];
	$customerID = $row['customerID'];	
	$customerName = $row['customerName'];
	$orderDate = $row['orderDate'];							
	$productCode = $row['productCode'];
	$retail_source = $row['retail_source'];
	$order_groupId = $row['order_groupId'];
	$quantity = $row['quantity'];
	$price_per_item = $row['price_per_item'];
	$total_price = $row['total_price'];

    }
if(isset($_POST['update_order'])){
//$orderID = $_POST['orderID'];
$customerID = $_POST['customerID'];
$orderDate = date['d-m-y'];
$customerName = $_POST['customerName'];
$productCode = $_POST['productCode'];
$retail_source = $_POST['retail_source'];

$quantity = $_POST['quantity'];
$price_per_item = $_POST['price_per_item'];
$total_price = $_POST['total_price'];
$order_groupId = $_POST['order_groupId'];



$query = "UPDATE orders SET ";
$query .="customerID = '{$customerID}', ";
$query .="customerName = '{$customerName}', ";
$query .="productCode = '{$productCode}', ";
$query .="retail_source = '{$retail_source}', ";
$query .="quantity = '{$quantity}', ";
$query .="price_per_item = '{$price_per_item}', ";
//$query .="total_price = '{$total_price}', ";
$query .="order_groupId = '{$order_groupId}' ";
$query .= "WHERE orderID= {$get_order_id} ";

$update_orders = mysqli_query($conn, $query);

if(!$update_orders){
die("Querry Failed" . mysqli_error($conn));
}
echo "<p> Orders Updated. <a href='view_all_orders.php?order_id={$get_order_id }'> View Orders </a> </p>";
}
?>

<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "customerID"> CustomerID </label>
<input value= "<?php echo $customerID; ?>" type="text" class= "form-control" name="customerID">
</div>
<div class= "form-group">
<label for= "customerName"> Customer Name </label>
<input value= "<?php echo $customerName; ?>" type="text" class= "form-control" name="customerName">
</div>

<div class= "form-group">
<label for= "productCode"> Product Code </label>
<input value= "<?php echo $productCode; ?>" type="text" class= "form-control" name="productCode">
</div>

<div class= "form-group">
<label for= "retail_source"> Retailer </label>
<input value= "<?php echo $retail_source; ?>" type="text" class= "form-control" name="retail_source">
</div>
<div class= "form-group">
<label for= "quantity"> Quantity </label>
<input value= "<?php echo $quantity; ?>" type="text" class= "form-control" name="quantity">
</div>

<div class= "form-group">
<label for= "price_per_item"> Price per Item</label>
<input value= "<?php echo $price_per_item; ?>" type="text" class= "form-control" name="price_per_item">
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
<input type="submit" class= "btn btn-primary" name="update_order" value="Update order">
</div>


</form>

 <div>
 <div>
 <div>
 <div>
				  
				   				   