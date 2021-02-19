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

   /*---upload multiple images---*/
       $imageArr = array();

       foreach ($_FILES["productImages"]["error"] as $key => $error) {

           if ($error == UPLOAD_ERR_OK) {

               $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG); //IMAGETYPE_JPG
               $detectedType = exif_imagetype($_FILES["productImages"]["tmp_name"][$key]);

               if(!in_array($detectedType, $allowedTypes)){
                   $msg = "Please upload a valid jpg or png file.";
                   //die();
               }else{
                   $tmp_name = $_FILES["productImages"]["tmp_name"][$key];
                   $name = $_FILES["productImages"]["name"][$key];
                   move_uploaded_file($tmp_name, "../users/images/".$name);
                   array_push($imageArr,$name);
               }
           }

       }

       $imageArr=serialize($imageArr);
   /*---end of upload multiple images---*/

       if($productImage !== ""){
           $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
           $detectedType = exif_imagetype($_FILES["productImage"]["tmp_name"]);
            //print_r($allowedTypes);
            //echo "<br>".$detectedType; die();
           if(!in_array($detectedType, $allowedTypes)){
               $msg = "Please upload a valid jpg or png file.";
               //die();
           }else{
               $msg = "Added successfully.";
               //die();
               move_uploaded_file($product_image_temp, "../users/images/$productImage");

               $query = "insert into products(categoryId, productCode, productName, productStatus, productImage, productImages, shippingDate, productColor, productSize, productPrice, Stock, mat_id, vendor_id, Description) ";
               $query .= "values({$categoryId},'{$productCode}', '{$productName}', '{$productStatus}', '{$productImage}', '{$imageArr}', now(), '{$productColor}', '{$productSize}', '{$productPrice}','{$stock}', '{$matId}', '{$vendorId}','{$Description}')";

               $create_product_query = mysqli_query($conn, $query);
               //$create_product_query =1;

               if(!$create_product_query){
                   die("Querry Failed" . mysqli_error($conn));
               }else{
                   /*---dynamic boxes---*/
                   $last_id = $conn->insert_id;
                   if(isset($_POST['totalDivCount'])){$totalDivCount = $_POST['totalDivCount'];}else{$totalDivCount = 0;}

                   for($i=0; $i<$totalDivCount; $i++){

                       if($i === 0){
                           $boxNumber = $i+1;
                           $length = $_POST['length_'];
                           $width = $_POST['width_'];
                           $height = $_POST['height_'];
                           $boxMeasurementUnits = $_POST['boxMeasurementUnits_'];
                           $weight = $_POST['weight_'];
                           $boxWeightUnits = $_POST['boxWeightUnits_'];
                           //var_dump( $weight.",".$boxWeightUnits);die();
                       }else{
                           if(isset($_POST['length_'.$i]) && $_POST['length_'.$i] != "" && !is_null($_POST['length_'.$i])){
                               $boxNumber = $i+1;
                               $length = $_POST['length_'.$i];
                               $width = $_POST['width_'.$i];
                               $height = $_POST['height_'.$i];
                               $boxMeasurementUnits = $_POST['boxMeasurementUnits_'.$i];
                               $weight = $_POST['weight_'.$i];
                               $boxWeightUnits = $_POST['boxWeightUnits_'.$i];
                           }else{
                               break;
                           }
                       }

                      $query = mysqli_query($conn, "insert into product_boxes (boxNumber,length,width,height,measurementUnits,weight,weightUnits,productId) values('$boxNumber','$length','$width','$height','$boxMeasurementUnits','$weight','$boxWeightUnits','$last_id')");
                    //$query = 1;
                   }
                   if(!$query){
                       die("Querry Failed" . mysqli_error($conn));
                   }else{
                       echo  "Product Created: " . " " . "<a href='view_all_products.php'> View all Products </a>";
                   }
                   /*---end od dynamic boxes---*/
               }
           }
       }



   }
   ?>
   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({selector:'textarea', height : "480"});</script>
    <?php if(isset($msg)){ ?>
        <div class="alert alert-primary" id="msg" role="alert" style="position:absolute;z-index: 99; right:1%;top:0%;">
            <a href="#" class="alert-link"><?php echo $msg; ?></a>.
        </div>
    <?php } ?>
<form action="" method="post" enctype="multipart/form-data">
   <div class= "form-group">
      <label for= "productName"> Product Name </label>
      <input  type="text" class= "form-control" name="productName">
   </div>
   <div class= "form-group">
   <label for= "productName"> Select Category :  </label>
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
      <label for= "productCode"> Materials :   </label>
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
      <label for= "productImage"> Product Image </label><span style="color:red;font-size: 1.6em;">*</span>
      <input  type="file" name="productImage">
   </div>
    <div class= "form-group">
        <label for= "productImage"> Other Product Images </label>
        <input  type="file" name="productImages[]" multiple>
    </div>
    <!------------------------------------------------------>
<!--    <div class="row">-->
        <div class= "form-holder">
            <input type="text" class="totalDivCount" name="totalDivCount" value="1" hidden>
            <label for= "productImage"> Box <span class="totalDivCountPreviousText">1</span><span class="totalDivCountText"></span> </label>

            <div class="form-group">
                <input type="text" id="item-code" class="length" placeholder="Length" name="length_"/>
                <input type="text" id="item-code" class="width" placeholder="Width" name="width_"/>
                <input type="text" id="item-code" class="height" placeholder="Height" name="height_"/>
                <select name="boxMeasurementUnits_">
                    <option value="" disabled selected>Select measurement unit</option>
                    <option value="inch">inch</option>
                    <option value="cm">cm</option>
                </select>
                <input type="text" id="item-code" class="weight" placeholder="Weight" name="weight_"/>
                <select name="boxWeightUnits_">
                    <option value="" disabled selected>Weight unit</option>
                    <option value="kgs">kgs</option>
                    <option value="lbs">lbs</option>
                </select>
                <button type="button" style="color:red;"><i class="material-icons remove"><i class="fa fas fa-trash"></i></i></button>
            </div>
            <div class="form-group col s1">

            </div>
        </div>
<!--    </div>-->
    <div class="form-holder-append"></div>
    <div class="row">
        <div class="form-group col-xs-4">
            <button type="button"><i class="material-icons add">+ Add more Boxes</i></button>
        </div>
    </div>
    <!------------------------------------------------------>
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
    <script>
        // Cloning Form
        var id_count = 1;
        // var lengthNameElement = $('.length').attr('name');
        //
        // if(lengthNameElement === "length_"){
        //     //$('.length').closest('.remove').hide();
        //     //$('.length').closest('i .remove').remove();
        //     $('.length').closest('button').hide();
        // }


        $('.add').on('click', function() {
            var source = $('.form-holder:first'), clone = source.clone();
            clone.find(':input').attr('id', function(i, val) {
                return val + id_count;
            });
            clone.find(':input').attr('name', function(i, val) {
                return val + id_count;
            });
            clone.find('.totalDivCountText').text(function(i, val) {
                return i+1 + id_count;
            });
            clone.find('.totalDivCountPreviousText').text('');
            clone.appendTo('.form-holder-append');
            id_count++;

            $('.totalDivCount').val(id_count);
        });

        // Removing Form Field
        $('body').on('click', '.remove', function() {
            var closest = $(this).closest('.form-holder').remove();
            var totalDivCountText  = $('.totalDivCount').val();
            var totalDivCountTextNew = totalDivCountText - 1;
            $('.totalDivCount').val(totalDivCountTextNew);
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#msg").delay(5000).slideUp(300);
        });
    </script>