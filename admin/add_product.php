<?php include "../inc/connect.php"; include "../DB.php";?>
<?php session_start(); ?>
<?php

   if(!(isset($_SESSION['adminId']))){

      header("Location: index.php");

   }

   $db = new DB('PRODUCTS');	

?>
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

   function getMatId($db){

      $getMatquery = "select * from material";
      $getMat = $db->query($getMatquery);
      return $getMat;

   }

   if(isset($_POST['create_product'])){
   
   $vendorId = $_SESSION['adminId'];
   $matId = $_POST['matId'];   
   $categoryId = $_POST['categoryId'];
   $productCode = $_POST['productCode'];
   $productName = $_POST['productName'];
   $productStatus = $_POST['productStatus'];
   
   $productImage = $_FILES['productImage']['name'];
   $product_image_temp = $_FILES['productImage']['tmp_name'];
   
   $shippingDate = date("l", mktime(0, 0, 0, 7, 1, 2000));;
   $productColor = $_POST['productColor'];
   $productSize = $_POST['productSize'];
   $productPrice = $_POST['productPrice'];
   $stock        = $_POST['stock'];
   $Description = $_POST['new_description'];
   $cat_title = $_POST['cat_title'];
   
   move_uploaded_file($product_image_temp, "../users/images/$productImage");
   
   $query = "insert into products(categoryId, productCode, productName, productStatus, productImage, shippingDate, productColor, productSize, productPrice, Stock, mat_id, vendor_id, Description) ";
   $query .= "values({$categoryId},'{$productCode}', '{$productName}', '{$productStatus}', '{$productImage}', now(), '{$productColor}', '{$productSize}', '{$productPrice}','{$stock}', '{$matId}', '{$vendorId}','{$Description}')";
   
   $create_product_query = mysqli_query($conn, $query);
   
   if(!$create_product_query){
   die("Querry Failed" . mysqli_error($conn));
   }
   
   echo  "Product Created: " . " " . "<a href='view_all_products.php'> View all Products </a>";
   
   
   }
   ?>
   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({selector:'textarea', height : "480"});</script>
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
      <label for= "productCode"> Mat Code </label>
      <select name="matId">
         <?php 
         
         $materials = getMatId($db);
         
         foreach($materials as $mat){
            ?>
               <option value="<?php echo $mat['mat_id']?>"><?php echo $mat['mat_title']?></option>
            <?php
         }
         
         ?>
      </select>

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
   <div class="tab-content tabs-2" >
        <textarea name="new_description">
        
        <p>
          <strong>Brand Name:</strong> <br>
          <strong>Origin:</strong> <br>
          <strong>Is Bulbs Included:</strong> <br>
          <strong>Warranty:</strong> <br>
          <strong>Holiday Name:</strong> <br>
          <strong>Body Material:</strong> <br>
          <strong>Plug The Tail:</strong> <br>
          <strong>Battery Type:</strong> <br>
          <strong>Light Source:</strong> <br>
          <strong>Music:</strong> <br>
          <strong>Voltage:</strong> <br>
          <strong>Is Dimmable:</strong> <br>
          <strong>Base Type:</strong> <br>
          <strong>Power Source:</strong> <br>
          <strong>Lighting Distance:</strong> <br>
          <strong>Head Number:</strong> <br>
          <strong>Model Number:</strong> <br>
          <strong>Features:</strong> <br>
          <strong>Certification:</strong> <br>
          <strong>Occasion:</strong> <br>
          <strong>Leds number:</strong> <br>
          <strong>Base Size:</strong> <br>
          <strong>Item:</strong> 
        </p>
        
        </textarea>
   </div>   
   </div>
   <div class= "form-group">
      <label for= "stock">Stock </label>
      <input  type="text" name="stock">
   </div>
   <div class= "form-group">
      <label for= "productImage"> Product Image </label>
      <input  type="file" name="productImage">
   </div>
   <div class= "form-group" hidden>
      <label for= "cat_title"> Category Title </label>
      <input  type="text" name="cat_title">
   </div>
   <div class= "form-group">
      <input type="submit" class= "btn btn-primary" name="create_product" value="Add product">
   </div>
</form>
<div>
<div>
<div>
<div>