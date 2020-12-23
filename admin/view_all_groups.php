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
                          View All Groups	
						   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						  <a href="add_groups.php"> <input type="button" class= "btn btn-primary"   value="Add groups"> </a>  

                        </h1>
					 </p>
                     



						
<table class="table table-bordered table-hover"> 
						<thead> 
						<tr> 
						<th>GroupID</th>
						<th>Group Name</th>						
						<th>Mark Up</th>
						<th>Group Category Name</th>						
						<th>Group Leader</th>
						<th>Edit</th>
						<th>Delete</th>
						
						</tr>
						</thead>
						

                   <tbody> 
				  <?php

				   $query = "SELECT * FROM groups";
				   $select_group = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($select_group)) {
							$groupId = $row['groupId'];
							$group_name = $row['group_name'];														
							$commission = $row['commission'];
							$group_category = $row['group_category'];							
							$group_leader = $row['group_leader'];
							
							
							
							echo "<tr>";
							
							echo "<td>$groupId </td>";
							echo "<td>$group_name </td>";							
							echo "<td>$commission</td>";							
							echo "<td>$group_category</td>";							
							echo "<td>$group_leader</td>";	
							
							echo "<td><a href='edit_groups.php?group_id={$groupId}'> Edit </a></td>";
							echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to delete'); \" href='view_all_groups.php?delete={$groupId}'> Delete </a></td>";
							echo "</tr>";

										

					}
				  ?>
				   		
				<?php
				   if(isset($_GET['delete'])){

				   $get_group_id = $_GET['delete'];

				   $query = "DELETE FROM groups WHERE groupId ={$get_group_id} ";
				   $delete_query = mysqli_query($conn, $query);
				   header("Location: view_all_groups.php");
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

				   