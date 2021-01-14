<?php include "../inc/connect.php"; ?>
<?php session_start(); ?>
<?php  include "includes/admin_header.php"; include "./adminFunctions.php";?>

<?php $AF =  new AdminFunctions();?>

<div id="wrapper">
<?php  include "includes/admin_navigation.php" ?>
<!-- /.navbar-collapse -->        
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Edit Categories   
            </h1>
            <?php	
               if(isset($_GET['category_id'])){
               
                $catDetails = $AF->getCategory($_GET['category_id']);

                $cat_title = $catDetails['cat_title'];
                $cat_tags = $catDetails['cat_tags'];
                $cat_image = $catDetails['cat_image'];
                $cat_date = $catDetails['cat_date'];

            }

             if(isset($_POST['update_category'])){

                $catTitle = $_POST['cat_title'];
                $cat_tags = $_POST['cat_tags'];

                $productImage = $_FILES['productImage']['name'];
                $product_image_temp = $_FILES['productImage']['tmp_name'];

                $AF->updateCategory($_GET['category_id'], $catTitle, $cat_tags, $productImage, $product_image_temp);
             }
               ?>
            <form action="" method="post" enctype="multipart/form-data">
               <div class= "form-group">
                  <div class= "form-group">
                     <label for= "cat_title"> Category Title </label>
                     <input value= "<?php echo $cat_title; ?>" type="text" class= "form-control" name="cat_title">
                  </div>
                  <div class= "form-group">
                     <label for= "cat_tags"> Tags </label>
                     <input  value= "<?php echo $cat_tags; ?>" type="text" class= "form-control" name="cat_tags">
                  </div>
                  <div class= "form-group">
                  <label for= "productImage"> Product Image </label>
                     <img width="100" src="../images/ <?php echo $cat_image; ?>" name="cat_image" alt="image"> 
                  </div>
                  <div class= "form-group">
                        
                        <input  type="file" name="productImage"/>
                  </div>
                  <div class= "form-group">
                     <input type="submit" class= "btn btn-primary" name="update_category" value="Update Category">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>