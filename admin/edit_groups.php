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
                          Edit Groups					   
                           
                        </h1>
						
  <?php 
if(isset($_GET['group_id'])){
    $get_group_id= $_GET['group_id'];
	}
		
		$query = "SELECT * FROM groups WHERE groupId = $get_group_id ";
				   $select_group = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($select_group)) {
							$groupId = $row['groupId'];
							$group_name = $row['group_name'];														
							$commission = $row['commission'];
							$group_category = $row['group_category'];							
							$group_leader = $row['group_leader'];

							}
        if(isset($_POST['update_groups'])){
		                    //$groupId = $_POST['groupId'];
							$group_name = $_POST['group_name'];														
							$commission = $_POST['commission'];
							$group_category = $_POST['group_category'];							
							$group_leader = $_POST['group_leader'];

$query = "UPDATE groups SET ";
$query .="group_name = '{$group_name}', ";
$query .="commission = '{$commission}', ";
$query .="group_category = '{$group_category}', ";
$query .="group_leader = '{$group_leader}' ";
$query .= "WHERE groupId= {$get_group_id} ";

$update_groups = mysqli_query($conn, $query);

if(!$update_groups){
die("Querry Failed" . mysqli_error($conn));
}

echo  "<P> groups Updated: " . " " . "<a href='view_all_groups.php'> View all groups </a>";


}
?>
<form action="" method="post" enctype="multipart/form-data">

<div class= "form-group">
<label for= "group_name"> Group name </label>
<input value= "<?php echo $group_name; ?>" type="text" class= "form-control" name="group_name">
</div>

<div class= "form-group">
<label for= "commission">Commission </label>
<input value= "<?php echo $commission; ?>"type="text" class= "form-control" name="commission">
</div>
<div class= "form-group">
<label for= "group_category"> Group category </label>
<input  value= "<?php echo $group_category; ?>" type="text" class= "form-control" name="group_category">
</div>
<div class= "form-group">
<label for= "group_leader"> Group leader name </label>
<input value= "<?php echo $group_leader; ?>" type="text" class= "form-control" name="group_leader">
</div>
<div class= "form-group">
<input type="submit" class= "btn btn-primary" name="update_groups" value="Update group">
</div>


</form>
<div>
<div>
<div>
</div>
		 
	 
				   