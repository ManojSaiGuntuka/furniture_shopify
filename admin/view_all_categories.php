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
                          View All Categories	 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;				   
                           
						  <a href="add_categories.php"> <input type="button" class= "btn btn-primary"   value="Add Categories"> </a>
                        </h1>
						
<table class="table table-bordered table-hover"> 
						<thead> 
						<tr> 
						<th>Id</th>
						<th>Category Title</th>						
						<th>Tags</th>
						<th>Image</th>
						<th>Date</th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>
						</thead>
						

                   <tbody> 
				  <?php

				   $query = "SELECT * FROM category";
				   $select_category = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($select_category)) {
							$cat_id = $row['cat_id'];
							$cat_title = $row['cat_title'];														
							$cat_tags = $row['cat_tags'];
							$cat_image = $row['cat_image'];
							 $cat_date = $row['cat_date'];
							echo "<tr>";
							
							echo "<td>$cat_id </td>";
							echo "<td>$cat_title </td>";							
							echo "<td>$cat_tags</td>";
							echo "<td><img width='100' src ='../images/$cat_image' alt='image'></td>";
							echo "<td>$cat_date</td>";

							$query = "SELECT * FROM category WHERE cat_id = {$cat_id}";
					       $select_categories_edit = mysqli_query($conn, $query);
								while($row = mysqli_fetch_assoc($select_categories_edit)){
							       $cat_id = $row['cat_id'];
								    $cat_title = $row['cat_title'];

							
							}

							
							echo "<td><a href='edit_categories.php?category_id={$cat_id}'> Edit </a></td>";
							echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to delete'); \" href='view_all_categories.php?delete={$cat_id}'> Delete </a></td>";
							echo "</tr>";


							}
				  ?>
				   				   
				   </tbody>	
				   </table>

				   <?php
				   if(isset($_GET['delete'])){

				   $get_cat_id = $_GET['delete'];

				   $query = "DELETE FROM category WHERE cat_id ={$get_cat_id} ";
				   $delete_query = mysqli_query($conn, $query);
				   header("Location: view_all_categories.php");
				   }
				   
				   ?>
				  

				  <div>
				  <div>
				 <div>
				 <div>
				 <div>
				 </body>
				  <html>

				   