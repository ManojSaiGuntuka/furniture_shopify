<?php  include "../inc/connect.php"; include "./adminFunctions.php";?>

 <?php 
 
    $AF = new AdminFunctions();

 if(isset($_POST['submit'])){

 $adminName = $_POST['adminName'];
 $email    = $_POST['email'];
 $password = $_POST['password'];

 if(!empty($adminName) && !empty($email) && !empty($password)) {
 
    if ($AF->isUserNameExist($adminName) === 0 && $AF->isUserNameExist($adminName) === 0){

        if(sizeOf($AF->insertAdmin($adminName, $email, $password)) === 1){

            ?>
                <script>
                    alert("You are registered")

                </script>
            <?php
            header("Location: index.php");
        }

    }else{
        ?>
            <script>
                alert("Username/Email already exist")
                location.reload()
            </script>
        <?php
    }

 }
 
 }
 ?>
 
<?php  include "includes/admin_header.php" ?>
    <div id="wrapper">

       <?php  include "includes/admin_navigation.php" ?>
            <!-- /.navbar-collapse -->  

    <!-- Page Content -->
    <div class="container">
    

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8">
                         <h1 class="page-header">
                           Users Registration Form  
                        </h1> 
               
                    <form role="form" action="users_register.php" method="post" id="login-form" autocomplete="off">

						<div class="form-group">
                            <label for="adminName" class="sr-only">username</label>
                            <input type="text" name="adminName" id="adminName" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
	</section>


        <hr>



</div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>