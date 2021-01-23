<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>
<?php  include "includes/admin_header.php"; include "./adminFunctions.php"; ?>
    <div id="wrapper">

       <?php  include "includes/admin_navigation.php"; $AF = new AdminFunctions(); ?>
            <!-- /.navbar-collapse -->        

        
<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Edit Admin					   
                           
                        </h1>
						
  <?php 
if(isset($_GET['editAdminId'])){
    
    $adminData = $AF->getAdmin($_GET['editAdminId']);
                    
}

if(isset($_POST['updateAdmin'])){

    $adminId = $_GET['editAdminId'];   
    $adminName = $_POST['adminName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $AF->editAdmin($adminId, $adminName, $address, $email, $password);

}


?>
<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "group_name"> Admin name </label>
<input value= "<?php echo $adminData['adminName'] ?>" type="text" class= "form-control" name="adminName">
</div>

<div class= "form-group">
<label for= "commission">Address </label>
<input value= "<?php echo $adminData['address'] ?>" type="text" class= "form-control" name="address">
</div>
<div class= "form-group">
<label for= "group_category"> Email </label>
<input  value= "<?php  echo $adminData['email']?>" type="text" class= "form-control" name="email">
</div>
<div class= "form-group">
<label for= "group_category"> Secured Encrypted Password </label>
<input  value= "<?php  echo $adminData['password']?>" type="text" class= "form-control" name="password">
</div>
<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="updateAdmin" value="Update My Details">
</div>


</form>
<div>
<div>
<div>
</div>
		 
	 
				   