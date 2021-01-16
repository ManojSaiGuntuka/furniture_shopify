<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>
<?php

   if(!(isset($_SESSION['adminId']))){

      header("Location: index.php");

   }

?>
<?php  include "includes/admin_header.php"; include "./adminFunctions.php"; ?>
<?php $AF = new AdminFunctions();?>
    <div id="wrapper">

       <?php  include "includes/admin_navigation.php" ?>
            <!-- /.navbar-collapse -->        

        
<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Add Groups					   
                           
                        </h1>
						
  <?php
				 
        if(isset($_POST['create_groups'])){
			$group_name = $_POST['group_name'];														
			$commission = $_POST['commission'];
            $group_category = $_POST['group_category'];	
            
            $conditionForGroup = (sizeof($AF->isGroup($group_category)) === 0 && sizeOf($AF->isGroupCommission($commission)) === 0);
            
            if($conditionForGroup){

                $query = "INSERT INTO groups(group_name, commission, group_category) ";
                $query .= "VALUES('{$group_name}', '{$commission}', '{$group_category}') ";
                $create_groups_query = mysqli_query($conn, $query);
                header("Location: view_all_groups.php");

            }else{

                ?>
                
                <script>
                
                    window.alert("Commission or Group Category Already Exist")

                </script>

                <?php
            }

        }

echo  "<a href='view_all_groups.php'> View all groups </a>";


?>
<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "group_name"> Group name </label>
<input  type="text" class= "form-control" name="group_name">
</div>

<div class= "form-group">
<label for= "commission">Commission </label>
<input  type="text" class= "form-control" name="commission">
</div>
<div class= "form-group">
<label for= "group_category"> Group category </label>
<input  type="text" class= "form-control" name="group_category">
</div>

<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="create_groups" value="Add groups">
</div>


</form>
<div>
<div>
<div>
</div>
		 
	 
				   