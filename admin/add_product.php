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
                          Add Products					   
                           
                        </h1>
<?php 
if(isset($_POST['create_product'])){

$categoryId = $_POST['categoryId'];
$productCode = $_POST['productCode'];
$productName = $_POST['productName'];
$productStatus = $_POST['productStatus'];

$productImage = $_FILES['productImage']['name'];
$product_image_temp = $_FILES['productImage']['tmp_name'];

$shippingDate = date['d-m-y'];
$productColor = $_POST['productColor'];
$productSize = $_POST['productSize'];
$productPrice = $_POST['productPrice'];
$stock        = $_POST['stock'];
$Description = $_POST['Description'];
$cat_title = $_POST['$cat_title']

move_uploaded_file($product_image_temp, "./images/$productImage");

$query = "INSERT INTO products(categoryId, productCode, productName, productStatus, productImage, shippingDate, productColor, productSize, productPrice, Stock, Description, cat_title) ";
$query .= "VALUES({$categoryId},'{$productCode}', '{$productName}', '{$productStatus}', '{$productImage}', now(), '{$productColor}', '{$productSize}', '{$productPrice}','{$stock}', '{$Description}' ,'{$cat_title}') ";
$create_product_query = mysqli_query($conn, $query);

if(!$create_product_query){
die("Querry Failed" . mysqli_error($conn));
}

echo  "Product Created: " . " " . "<a href='view_all_products.php'> View all Products </a>";


}
?>
<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "productName"> Product Name </label>
<input  type="text" class= "form-control" name="productName">
</div>

<div class= "form-group">
<select name="categoryId" id="">

<?php 
$query = "SELECT * FROM category";
$select_categories = mysqli_query($conn, $query);
if(!$select_categories){
die("Querry Failed" . mysqli_error($conn));
}

while($row = mysqli_fetch_assoc($select_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
     echo "<option value='$cat_id'>{$cat_title}</option>";								
    								
	}
?>


</select>
</div>

<div class= "form-group">
<label for= "productCode"> Product Code </label>
<input  type="text" class= "form-control" name="productCode">
</div>

<div class= "form-group">
<label for= "productColor"> Product Color</label>
<input  type="text" class= "form-control" name="productColor">
</div>

<div class= "form-group">
<label for= "productSize"> Product Size</label>
<input  type="text" class= "form-control" name="productSize">
</div>

<div class= "form-group">
<label for= "productPrice"> Product Price</label>
<input  type="text" class= "form-control" name="productPrice">
</div>
<div class= "form-group">
<label for= "productStatus"> Product Status</label>
<input  type="text" class= "form-control" name="productStatus">
</div>
<div class= "form-group">
<label for= "Description">Description </label>
<textarea  name="Description"></textarea>
</div>

<div class= "form-group">
<label for= "stock">Stock </label>
<input  type="text" name="stock">
</div>

<div class= "form-group">
<label for= "productImage"> Product Image </label>
<input  type="file" name="productImage">
</div>



<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="create_product" value="Add product">
</div>


</form>

 <div>
 <div>
 <div>
 <div>
				  
				   				   