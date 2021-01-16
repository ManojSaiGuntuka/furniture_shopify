<?php  include "../inc/connect.php"; include "./adminFunctions.php";?>

 <?php 
 
    $AF = new AdminFunctions();
 
 if(isset($_POST['submit'])){

 $email    = $_POST['email'];
 $password = $_POST['password'];

    if($AF->loginAdmin($email, $password) === false){
        ?>
            <script>
                alert("Invalid email/password")
            </script>
        <?php
    }

  }else {
  ?>
    <script>
       // alert("Incorrect Credentials Entered")
       // location.reload()
    </script>
    <?php
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
                           Users Login  
                        </h1> 
               
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
						
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input required type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input required type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                    </form>
                 </hr>
                 <p>  Don't have an account? &nbsp;&nbsp; <a href="users_register.php"> Register Now! </a></p>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> 
