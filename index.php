

<!DOCTYPE html>
<html lang="en">
  <head>  
           <title>ClickrippleFurnitureapp</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
	  <header>
	<?php 
	
	require_once("includes/navigation.php");
	?>
	</header>
  </head>
  <body>
  
  
  <br>
  <div class="col-md-8">
  <div class = "container" style = "width:700px;">
      <h3 align = "center">  View all products </h3> </br>

	   <?php
	  
	require_once("inc/connect.php");	
	
	?>

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
					?>

					
                <p class="lead">                 
				
                 Date <span class="glyphicon glyphicon-time"></span>
				<?php echo $shippingDate; ?> &nbsp;&nbsp;
				<?php echo $productName; ?></a> 
				</p>

				<div class="col-md-4">	
				<br>
				Product Status: &nbsp;&nbsp; <?php echo $productStatus; ?></a>
				Product Code: &nbsp;&nbsp;<?php echo $productCode; ?></br>
                 Color: <?php echo $productColor ?>  </br>
				Size of product: &nbsp;&nbsp; <?php echo $productSize ?> </br>
				Price of products: &nbsp;&nbsp; $<?php echo $productPrice ?>
				
				</div>
                <hr>
				
                <img class="img-responsive" src="images/<?php echo $productImage; ?>" alt="" height= "50" width= "400">
				
                <hr>
				
                <a class="btn btn-primary" href="#importproduct">See More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
	
                     <?php    }			?>		 
          
			</div>
			</div>
			<!-- Blog Sidebar Widgets Column -->
     <?php 
	
	require_once("search.php");
	?>

	
 </body>
</html>  
  
		
