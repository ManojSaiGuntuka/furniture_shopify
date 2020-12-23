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
                          View All Orders					   
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						  <a href="add_orders.php"> <input type="button" class= "btn btn-primary"   value="Add Orders"> </a>
                        </h1>
						
<table class="table table-bordered table-hover"> 
						<thead> 
						<tr> 
						<th>ID</th>
						<th>Customer ID</th>	
						<th>Customer Name</th>
						<th>Order Date</th>						
						<th>Product Code</th>
						<th>Retailer</th>
						<th>Group Name</th>
						<th>Quantity</th>
						<th>Price Per Item</th>
						<th>Total Price</th>
						<th>Edit</th>
						<th>Delete</th>					

						</tr>
						</thead>
						

                   <tbody> 
				  <?php

				   $query = "SELECT * FROM orders";
				   $select_order = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($select_order)) {
							$orderID = $row['orderID'];
							$customerID = $row['customerID'];	
							$customerName = $row['customerName'];
							$orderDate = $row['orderDate'];							
							$productCode = $row['productCode'];
							$retail_source = $row['retail_source'];
							$order_groupId = $row['order_groupId'];
							$quantity = $row['quantity'];
							$price_per_item = $row['price_per_item'];

							//$total_price = $row['total_price'];
							$total_price = $quantity * $price_per_item;

							echo "<tr>";
							
							echo "<td>$orderID </td>";
							echo "<td>$customerID </td>";														
							echo "<td>$customerName</td>";
							echo "<td>$orderDate</td>";
							echo "<td>$productCode</td>";
							echo "<td>$retail_source</td>";	
							//echo "<td>{$group_category}</td>";
							$query = "SELECT * FROM groups WHERE groupId = {$order_groupId}";
					       $select_group_id = mysqli_query($conn, $query);

								while($row = mysqli_fetch_assoc($select_group_id)){							       
								//   $order_groupId = $row['order_groupId'];
									$group_category = $row['group_category'];
									echo "<td>{$group_category}</td>";
									
							}
							
							echo "<td>$quantity</td>";
							echo "<td>$price_per_item</td>";
							

							echo "<td>$total_price </td>";

							echo "<td><a href='edit_orders.php?order_id={$orderID}'> Edit </a></td>";
							echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to delete'); \" href='view_all_orders.php?delete={$orderID}'> Delete </a></td>";
							echo "</tr>";

							

							}
				  ?>

				  <?php
				   if(isset($_GET['delete'])){

				   $get_order_id = $_GET['delete'];

				   $query = "DELETE FROM orders WHERE orderID ={$get_order_id} ";
				   $delete_query = mysqli_query($conn, $query);
				   header("Location: view_all_orders.php");
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

				   