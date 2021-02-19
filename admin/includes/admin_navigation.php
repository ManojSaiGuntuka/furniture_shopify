
<?php

    if(isset($_POST['logout'])){

        session_destroy();
        header("Location: ../index.php");

    }

?>

<body>
 
    <div id="wrapper">
	    
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./admin_index.php">PHP Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
			<li> <a href= "./index.php"> Admin login </a> </li>
				<li> <a href= "./index.php"> Home </a> </li>
                			
	               <li>

                    <?php if(isset($_SESSION['adminId'])) {?>
                    <form method="post">
                        <i class="fa fa-user"><input type="submit" name="logout" value="Logout" class="fa fa-user"/></i>
                    </form>
                    <?php } ?>

                </li>
            </ul>
            <?php if(isset($_SESSION['adminId'])) {?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    

					<li>
                        <a href="./view_all_categories.php"> <i class="fa fa-fw fa-wrench"></i> &nbsp;Categories  </i> </a>
                    </li>		

					
					<li>
                        <a href="./view_all_products.php"> <i class="fa fa-fw fa-arrows-v"></i>  &nbsp;Products </i> </a>
                    </li>
                    <li>
                        <a href="./view_all_materials.php"> <i class="fa fa-fw fa-arrows-v"></i>  &nbsp;Materials </i> </a>
                    </li>
                     
					<li>
                        <a href="./view_all_orders.php"> <i class="fas fa-clipboard fa-lg"></i> &nbsp; Orders  </i> </a>
                    </li>
					<li>
                        <a href="./view_all_groups.php"> <i class="fa fa-users"></i> &nbsp; Groups  </i> </a>
                    </li>
					<li>
                        <a href="./view_all_retailers.php"> <i class="fa fa-bitbucket"></i> &nbsp; Retailers  </i> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-user"></i> &nbsp; Earnings  </i> </a>
                        <ul>
                        
                            <li><a href="view_all_earnings.php"> <i class="fa fa-user"></i> &nbsp; All Earnings  </i> </a></li>
                            <li><a href="view_earning_store.php"> <i class="fa fa-user"></i> &nbsp; Earnings By Store </i> </a></li>

                        </ul>
                    </li>	
                    <li>
                        <a href="./edit_admin.php?editAdminId=<?php echo $_SESSION['adminId']?>"> <i class="fa fa-user"></i> &nbsp; General Settings  </i> </a>
                    </li>						
                </ul>
            </div>
            <?php } ?>
			</nav>
			</div>



       