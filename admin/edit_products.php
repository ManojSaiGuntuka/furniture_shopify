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
                         Edit Products				   
                           
                        </h1>
<?php	
	if(isset($_GET['products_id'])){
    $get_products_id = $_GET['products_id'];

}

$query = "SELECT * FROM products WHERE productId = $get_products_id ";
 $select_product_id = mysqli_query($conn, $query);

 while($row = mysqli_fetch_assoc($select_product_id)) {
 $productId= $row['productId'];
$productName = $row['productName'];
$productCode = $row['productCode'];
$productColor = $row['productColor'];
$productSize = $row['productSize'];
$productPrice = $row['productPrice'];
$productStatus = $row['productStatus'];
$productImage = $row['productImage'];
$shippingDate = $row['shippingDate'];
$Stock = $row['Stock'];
$Description = $row['Description'];

}

if(isset($_POST['update_product'])) {

//$productId = $_POST['productId'];
$productName = $_POST['productName'];
$categoryId = $_POST['cat_title'];
$productCode = $_POST['productCode'];
//$productName = $_POST['productName'];
$productColor = $_POST['productColor'];
$productSize = $_POST['productSize'];
$productPrice = $_POST['productPrice'];
$productStatus = $_POST['productStatus'];
$productImage = $_FILES['productImage']['name'];
$product_image_temp = $_FILES['productImage']['tmp_name'];
$Stock = $_POST['Stock'];
$Description = $_POST['new_description'];

move_uploaded_file($product_image_temp, "../images/$productImage" );

if(empty($productImage)){
	$query = "SELECT * FROM products WHERE productId = $get_products_id ";
	$select_image = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($select_image)){
		$productImage = $row['productImage'];
	}
}

$query = "UPDATE products SET ";
$query .="categoryId= '{$categoryId}', ";
$query .="productCode = '{$productCode}', ";
$query .="productName = '{$productName}', ";
$query .="productStatus = '{$productStatus}', ";
$query .="productImage= '{$productImage}', ";
$query .="productColor = '{$productColor}', ";
$query .="productSize = '{$productSize}', ";
$query .="productPrice = '{$productPrice}', ";
$query .="Stock = '{$Stock}',";
$query .="Description = '{$Description}'";
//$query .="cat_title = '{$cat_title}'";

$query .= "WHERE productId = {$get_products_id} ";

$update_product = mysqli_query($conn, $query);

if(!$update_product){
die("Querry Failed" . mysqli_error($conn));
}
echo "<p> Product Updated. <a href='view_all_products.php?products_id={$get_products_id }'> View Products </a> </p>";

}
?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({selector:'textarea', height : "480"});</script>				
<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "productName"> Product Name </label>
<input  value= "<?php echo $productName; ?>" type="text" class= "form-control" name="productName">
</div>

<div class= "form-group">
<select name="cat_title" for ="cat_title" id="">

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
<input  value= "<?php echo $productCode; ?>" type="text" class= "form-control" name="productCode">
</div>

<div class= "form-group">
<label for= "productColor"> Product Color</label>
<input value= "<?php echo $productColor; ?>"  type="text" class= "form-control" name="productColor">
</div>

<div class= "form-group">
<label for= "productSize"> Product Size</label>
<input value= "<?php echo $productSize; ?>" type="text" class= "form-control" name="productSize">
</div>

<div class= "form-group">
<label for= "productPrice"> Product Price</label>
<input value= "<?php echo $productPrice; ?>" type="text" class= "form-control" name="productPrice">
</div>

<div class= "form-group">
<label for= "productStatus"> Product Status</label>
<input value= "<?php echo $productStatus; ?>" type="text" class= "form-control" name="productStatus">
</div>

<div class= "form-group">
<label for= "Stock">Stock </label>
<input value= "<?php echo $Stock; ?>" type="text" name="Stock">
</div>

<div class= "form-group">
<label for= "Description">Description </label>
<textarea name="new_description"><?echo $Description?></textarea>
</div>

<div class= "form-group">
<label for= "productImage"> Product Image </label>
<input  type="file" name="productImage" value=<?php echo $productImage?>> Current Image :<?php echo $productImage?>
</div>


<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="update_product" value="Update product">
</div>
</div>
</form>
 <div>
 <div>
 <div>
 <div>
 </body>
 <html>

				   