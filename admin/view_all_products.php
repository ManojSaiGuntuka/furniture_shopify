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
                          View All Products					   
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						  <a href="add_product.php"> <input type="button" class= "btn btn-primary"   value="Add Products"> </a>
						  <a href="../import_products.php"> <input type="button" class= "btn btn-primary"   value="ImportProducts"> </a>
                        </h1>
						
<table class="table table-bordered table-hover"> 
						<thead> 
						<tr> 
						<th>Id</th>
						<th>Title</th>
						<th>category</th>
						<th>Code</th>
						<th>Color</th>
						<th>ProductWeight</th>
						<th>Price</th>
						<th>Status</th>						
						<th>Image</th>
						<th>Shipping Date</th>
						<th>Stock</th>
						<th>Description</th>
						<th>category_title<th>
						<th>Edit</th>
						<th>Delete</th>
						</tr>
						</thead>
						

                   <tbody> 
				  <?php

				   $query = "SELECT * FROM products";
				   $select_product = mysqli_query($conn, $query);
					while($row = mysqli_fetch_assoc($select_product)) {
							$productId = $row['productId'];
							$categoryId = $row['categoryId'];
							$productCode = $row['productCode'];
							$productName = $row['productName'];
							$productStatus = $row['productStatus'];							
							$productImage = $row['productImage'];							
							$shippingDate = $row['shippingDate'];
							$productColor = $row['productColor'];
							$productSize = $row['productSize'];
							$productPrice = $row['productPrice'];
							$stock        = $row['Stock'];
							$Description = $row['Description'];
							//$cat_title = $row['$cat_title'];
							echo "<tr>";
							
							echo "<td>$productId </td>";
							echo "<td>$productName</td>";
							
							$query = "SELECT * FROM category WHERE cat_id = {$categoryId}";
					       $select_categories_id = mysqli_query($conn, $query);

								while($row = mysqli_fetch_assoc($select_categories_id)){
							    	//$categoryId = $row['categoryId'];
								    $cat_title = $row['cat_title'];	
								   echo "<td>$categoryId</td>";
									//echo "<td>{$cat_title}</td>";
									
							}
							echo "<td>$productCode</td>";
							echo "<td>$productColor</td>";
							echo "<td>$productSize</td>";
							echo "<td>$productPrice</td>";

							echo "<td>$productStatus</td>";
							
							
							echo "<td> <img width='80' src ='../images/$productImage' alt='image'></td>";
							echo "<td>$shippingDate</td>";
							echo "<td>$stock</td>";	
							echo "<td>$Description</td>";
							echo "<td>$cat_title</td>";

							

							echo "<td><a href='edit_products.php?products_id={$productId}'> Edit </a></td>";
							echo "<td><a onClick = \"javascript: return confirm('Are you sure you want to delete'); \" href='view_all_products.php?delete={$productId}'> Delete </a></td>";
							echo "</tr>";


							}
				  ?>
				   				   
				   </tbody>	
				   </table>

				   <?php
				   if(isset($_GET['delete'])){

				   $get_product_id = $_GET['delete'];

				   $query = "DELETE FROM products WHERE productId ={$get_product_id} ";
				   $delete_query = mysqli_query($conn, $query);
				   header("Location: view_all_products.php");
				   }
				   
				   ?>
				  
				  
				  <div>
				  <div>
				<div>
			 <div>
		<div>
	 </body>
	<html>

				   