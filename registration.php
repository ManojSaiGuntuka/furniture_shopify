<?php  include "inc/connect.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php 
 
 if(isset($_POST['submit'])){

 $adminName = $_POST['adminName'];
 $email    = $_POST['email'];
 $password = $_POST['password'];

 if(!empty($adminName) && !empty($email) && !empty($password)) {

 
 $adminName = mysqli_real_escape_string($conn, $adminName);
 $email   =  mysqli_real_escape_string($conn, $email);
 $password = mysqli_real_escape_string($conn, $password);


 $query = "SELECT randPass FROM admin";
 $select_randPass_query = mysqli_query($conn, $query);

 if(!$select_randPass_query){
   die("Query Failed" . mysqli_error($conn));
 }

 $row = mysqli_fetch_array($select_randPass_query);
 $pass = $row['randPass'];
 //$password = crypt($password, $pass);
 
 $query = "INSERT INTO admin(adminName, password, email) ";
 $query .= "VALUES('{$adminName}', '{$password}', '{$email}' ) ";
 $register_user_query = mysqli_query($conn, $query);

 if(!$register_user_query){
   die("Query Failed" . mysqli_error($conn) . ' ' . mysqli_error($conn));
 }

  $message = "Your Registration has been submitted!!!";

 }else {
 	 $message = "Fields should not be empty!!";
 }
 
 }else{
 $message ="";
 }
 ?>



    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h5 class= "text-center"> <?php echo $message; ?></h5>
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
