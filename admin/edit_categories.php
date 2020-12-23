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
                           Edit Categories   
                        </h1> 
						

	<?php	
	if(isset($_GET['category_id'])){
    $get_category_id = $_GET['category_id'];

}
 $query = "SELECT * FROM category WHERE cat_id = $get_category_id ";
 $select_category_id = mysqli_query($conn, $query);

 while($row = mysqli_fetch_assoc($select_category_id)) {
 $cat_id = $row['cat_id'];
 $cat_title = $row['cat_title'];
$cat_tags = $row['cat_tags'];
$cat_image = $row['cat_image'];
$cat_date = $row['cat_date'];

}


if(isset($_POST['update_category'])) {

$cat_title = $_POST['cat_title'];
$cat_tags = $_POST['cat_tags'];
$cat_image = $_FILES['cat_image']['name'];
$cat_image_temp = $_FILES['cat_image']['tmp_name'];
$cat_date = date['d-m-y'];
move_uploaded_file($cat_image_temp, "../images/$cat_image" );

if(empty($cat_image)){
	$query = "SELECT * FROM category WHERE cat_id = $get_category_id ";
	$select_image = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($select_image)){
		$cat_image = $row['cat_image'];
	}
}
$query = "UPDATE category SET ";
$query .="cat_title= '{$cat_title}', ";
$query .="cat_tags = '{$cat_tags}', ";
$query .="cat_image = '{$cat_image}' ";
//$query .="cat_date = now() ";
$query .= "WHERE cat_id = {$get_category_id} ";

$update_category = mysqli_query($conn, $query);

if(!$update_category){
die("Querry Failed" . mysqli_error($conn));
}
echo "<p> Categories Updated. <a href='view_all_categories.php?category_id={$get_category_id }'> View categories </a> </p>";

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
<img width="100" src="../images/ <?php echo $cat_image; ?>" name="cat_image" alt="image"> 
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

      
