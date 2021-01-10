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
                          Add Groups					   
                           
                        </h1>
						
  <?php
				 
        if(isset($_POST['create_groups'])){
			$group_name = $_POST['group_name'];														
			$commission = $_POST['commission'];
			$group_category = $_POST['group_category'];							
			$group_leader = $_POST['group_leader'];
		
            $query = "INSERT INTO groups(group_name, commission, group_category, group_leader ) ";
            $query .= "VALUES('{$group_name}', '{$commission}', '{$group_category}', '{$group_leader}' ) ";
            $create_groups_query = mysqli_query($conn, $query);

            if(!$create_groups_query){
            die("Querry Failed" . mysqli_error($conn));
            }

echo  "groups Created: " . " " . "<a href='view_all_groups.php'> View all groups </a>";


}
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
<label for= "group_leader"> Group leader name </label>
<input  type="text" class= "form-control" name="group_leader">
</div>
<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="create_groups" value="Add groups">
</div>


</form>
<div>
<div>
<div>
</div>
		 
	 
				   