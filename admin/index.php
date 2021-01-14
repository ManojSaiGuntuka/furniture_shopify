<?php  include "../inc/connect.php"; ?>
<?php session_start(); ?>

 <?php 
 
 if(isset($_POST['submit'])){

 $adminName = $_POST['adminName'];
 $email    = $_POST['email'];
 $password = $_POST['password'];


 
 $adminName = mysqli_real_escape_string($conn, $adminName);
 $email   =  mysqli_real_escape_string($conn, $email);
 $password = mysqli_real_escape_string($conn, $password);


 $query = "SELECT * FROM admin WHERE adminName = '{$adminName}'";
 $select_randPass_query = mysqli_query($conn, $query);

  $select_user_query = mysqli_query($conn, $query);
 if(!$select_user_query){
 
 die("QUERY FAILED". mysqli_error($conn));
 }

 while($row = mysqli_fetch_array($select_user_query)){
 
 $db_id = $row['adminId']; 
 $db_username = $row['adminName'];
 $db_user_password = $row['password']; 
 
 }
 if($adminName === $db_username && $password === $db_user_password){
    $_SESSION['adminId'] = $db_id;
    $_SESSION['adminName'] = $db_username;

	 
 header("Location: view_all_products.php");

  }else {
  header("Location: users_login.php");
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
                           Users Login  
                        </h1> 
               
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
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
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                    </form>
                 </hr>
                 <p>  Don't have an account? &nbsp;&nbsp; <a href="users_register.php"> Register Now! </a></p>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
