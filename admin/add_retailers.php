<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>

<?php

   if(!(isset($_SESSION['adminId']))){

      header("Location: index.php");

   }

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
                          Add Retailers					   
                           
                        </h1>
						
  <?php
				 
        if(isset($_POST['create_retailers'])){
		                    $retailer_id = $_POST['retailer_id'];
							$retailer_address = $_POST['retailer_address'];														
							$retailer_name = $_POST['retailer_name'];
							$retailer_group = $_POST['retailer_group'];							
							
		
$query = "INSERT INTO retailer(retailer_address, retailer_name, retailer_group ) ";
$query .= "VALUES('{$retailer_address}', '{$retailer_name}', '{$retailer_group}' ) ";
$create_retailer_query = mysqli_query($conn, $query);

if(!$create_retailer_query){
die("Querry Failed" . mysqli_error($conn));
}

echo  "Retailers Created: " . " " . "<a href='view_all_retailers.php'> View all retailers </a>";


}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class= "form-group">
<label for= "retailer_name">Retailer Name </label>
<input  type="text" class= "form-control" name="retailer_name">
</div>

<div class= "form-group">
<label for= "retailer_address"> Retailer Address </label>
<input  type="text" class= "form-control" name="retailer_address">
</div>

<div class= "form-group">
<label for= "retailer_group"> Group </label>
<input  type="text" class= "form-control" name="retailer_group">
</div>

<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="create_retailers" value="Add retailer">
</div>


</form>
<div>
<div>
<div>
</div>
		 
	 
				   