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
                          Edit Retailers					   
                           
                        </h1>
						
  <?php 
if(isset($_GET['retailer_id'])){
    $get_retailer_id = $_GET['retailer_id'];
	}
		
		$query = "SELECT * FROM retailer WHERE retailer_id = $get_retailer_id ";
				   $select_retailer = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($select_retailer)) {
							$retailer_id  = $row['retailer_id '];
							$retailer_address = $row['retailer_address'];														
							$retailer_name = $row['retailer_name'];
							$retailer_group = $row['retailer_group'];							
							

							}
        if(isset($_POST['update_retailers'])){
		                    //$retailer_id  = $_POST['retailer_id '];
							$retailer_address = $_POST['retailer_address'];														
							$retailer_name = $_POST['retailer_name'];
							$retailer_group = $_POST['retailer_group'];							
							

$query = "UPDATE retailer SET ";
$query .="retailer_address = '{$retailer_address}', ";
$query .="retailer_name = '{$retailer_name}', ";
$query .="retailer_group = '{$retailer_group}' ";
$query .= "WHERE retailer_id= {$get_retailer_id} ";

$update_retailers = mysqli_query($conn, $query);

if(!$update_retailers){
die("Querry Failed" . mysqli_error($conn));
}

echo  "<P> Retailers Updated: " . " " . "<a href='view_all_retailers.php'> View all retailers </a>";


}
?>
<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "retailer_name"> Retailer Name </label>
<input value= "<?php echo $retailer_name; ?>" type="text" class= "form-control" name="retailer_name">
</div>

<div class= "form-group">
<label for= "retailer_address">Retailer Address </label>
<input value= "<?php echo $retailer_address; ?>"type="text" class= "form-control" name="retailer_address">
</div>
<div class= "form-group">
<label for= "retailer_group"> Group </label>
<input  value= "<?php echo $retailer_group; ?>" type="text" class= "form-control" name="retailer_group">
</div>

<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="update_retailers" value="Update retailer">
</div>


</form>
<div>
<div>
<div>
</div>
		 
	 
				   