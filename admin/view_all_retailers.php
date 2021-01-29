<?php include "../inc/connect.php"; include "./adminFunctions.php";?>
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
			<?php
			
				$AF = new AdminFunctions();
				
				$retailers = $AF->getAllRetailers();

				if(isset($_GET['delete'])){

					$AF->deleteRetailer($_GET['delete']);

				}

			?>
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
						<th>Store Name</th>						
						<th>Edit</th>
						<th>Delete</th>						
						</tr>
						</thead>					

                   <tbody> 
				  <?php

					foreach ($retailers as $retailer) {
							$retailer_id = $retailer['user_id'];
							$retailer_address = $retailer['user_address'];														
							$retailer_name = $retailer['username'];
							$retailer_group = $retailer['user_group_id'];		
								
							
							echo "<tr>";
							
							echo "<td>$retailer_id </td>";
							echo "<td>$retailer_address </td>";							
							echo "<td>$retailer_name</td>";							
							?><td><?php echo $retailer_group?>  <?php echo $AF->getGroupCommission($retailer_group)['commission']?></td><?php						
							
							$store = $AF->getCurStoreUser($retailer_id);

							if(sizeof($store) > 0){
								$curStore = $store[0]['storeName'];
								echo "<td> $curStore </td>";
							}else{
								echo "<td> </td>";
							}

							echo "<td><a href='edit_retailers.php?retailer_id={$retailer_id}'> Edit </a></td>";
							echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to delete'); \" href='view_all_retailers.php?delete={$retailer_id}'> Delete </a></td>";
							echo "</tr>";
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

				   