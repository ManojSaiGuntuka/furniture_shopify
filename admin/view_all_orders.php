<?php include "../inc/connect.php"; ?>

<?php session_start(); ?>
<?php  

	include "includes/admin_header.php";
	include "../users/userFunctions.php";

	$UF = new UserFunctions();

	

?>
    <div id="wrapper">

       <?php  include "includes/admin_navigation.php" ?>
            <!-- /.navbar-collapse -->        

<link rel="stylesheet" href="./css/panel.css" />
<div id="page-wrapper">
	<?php
	
	$allOrders = $UF->getOrders();

	$dumy = json_decode($allOrders['data']);

	print_r($dumy->orders);

	?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          View All Orders					   
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						  <a href="add_orders.php"> <input type="button" class= "btn btn-primary"   value="Add Orders"> </a>
                        </h1>
						
						<div class="orders">
							<div class="grid">
	
								<div class="module all-orders">All Orders</div>
								<div class="module proccessing-orders">Proccessing Orders</div>
								<div class="module cancelled-orders">Cancelled Orders</div>
								<div class="module completed-orders">Completed Orders</div>

							</div>
						</div>

				  <div>
				<div>
			  <div>
			<div>
 <div>
				   