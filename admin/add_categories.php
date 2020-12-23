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
                           Add Categories   
                        </h1> 
						

	<?php	
	if(isset($_POST['create_category'])) {

$cat_title = $_POST['cat_title'];
$cat_tags = $_POST['cat_tags'];

$cat_image = $_FILES['cat_image']['name'];
$cat_image_temp = $_FILES['cat_image']['tmp_name'];
$cat_date = date['d-m-y'];

move_uploaded_file($cat_image_temp, "../images/$cat_image" );

$query = "INSERT INTO category(cat_title, cat_tags, cat_image, cat_date) ";
$query .= "VALUES('{$cat_title}', '{$cat_tags}', '{$cat_image}', now()) ";
$create_category_query = mysqli_query($conn, $query);

if(!$create_category_query){
die("Querry Failed" . mysqli_error($conn));
}

echo  "Categories Creadted: " . " " . "<a href='view_all_categories.php'> View all Categories </a>";


}
?>

                   
<form action="" method="post" enctype="multipart/form-data">
<div class= "form-group">


<div class= "form-group">
<label for= "cat_title"> Category Title </label>
<input  type="text" class= "form-control" name="cat_title">
</div>


<div class= "form-group">
<label for= "cat_tags"> Tags </label>
<input  type="text" class= "form-control" name="cat_tags">
</div>

<div class= "form-group">
<label for= "cat_image"> Image  </label>
<input  type="file" name="cat_image">
</div>


<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="create_category" value="Add Category">
</div>
</div>
</form>
 </div>     
	</div>
	</div>
	</div>

      
