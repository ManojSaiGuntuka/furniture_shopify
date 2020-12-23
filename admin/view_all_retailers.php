<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>
<?php  include "includes/admin_header.php" ?>
    <div id="wrapper">

       <?php  include "includes/admin_navigation.php" ?>
            <!-- /.navbar-collapse -->        

        
<div id="page-wrapper">
          
            <div class="container-fluid">
			
                <div class="row">
				<div class="col-lg-12">
                        <h1 class="page-header">
                          View All Retailers	
						   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						  <a href="add_retailers.php"> <input type="button" class= "btn btn-primary"   value="Add retailer"> </a>  

                        </h1>
					 </p>
                     



						
<table class="table table-bordered table-hover"> 
						<thead> 
						<tr> 
						<th>ID</th>
						<th>Retailer Address</th>						
						<th>Retailer Name</th>
						<th>Group</th>					
						<th>Edit</th>
						<th>Delete</th>						
						</tr>
						</thead>					

                   <tbody> 
				  <?php

				   $query = "SELECT * FROM retailer";
				   $select_retailer = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($select_retailer)) {
							$retailer_id = $row['retailer_id'];
							$retailer_address = $row['retailer_address'];														
							$retailer_name = $row['retailer_name'];
							$retailer_group = $row['retailer_group'];		
								
							
							echo "<tr>";
							
							echo "<td>$retailer_id </td>";
							echo "<td>$retailer_address </td>";							
							echo "<td>$retailer_name</td>";							
							echo "<td>$retailer_group</td>";							
							
							
							echo "<td><a href='edit_retailers.php?retailer_id={$retailer_id}'> Edit </a></td>";
							echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to delete'); \" href='view_all_retailers.php?delete={$retailer_id}'> Delete </a></td>";
							echo "</tr>";

										

					}
				  ?>
				   		
				<?php
				   if(isset($_GET['delete'])){

				   $get_retailer_id = $_GET['delete'];

				   $query = "DELETE FROM retailer WHERE retailer_id ={$get_retailer_id} ";
				   $delete_query = mysqli_query($conn, $query);
				   header("Location: view_all_retailers.php");
				   }
				   
				   ?>
				  		

				   </tbody>	
				   </table>

				   
				  <div>
				<div>
			  <div>
			<div>
		 <div>
	 </body>
 <html>

				   