<?php  include "inc/connect.php"; ?>
 <?php  include "includes/header.php"; include "./DB.php";?>

 <?php 



 if(isset($_POST['submit'])){

 $username = $_POST['username'];
 $user_firstname = $_POST['user_firstname'];
 $user_lastname = $_POST['user_lastname'];
 $user_email    = $_POST['user_email'];
 $user_password = $_POST['user_password'];
 $user_address =$_POST['user_address'];
 $user_group_id =$_POST['user_group_id'];

 if(!empty($username) && !empty($user_firstname) && !empty($user_lastname) && !empty($user_email) && !empty($user_password) ) {

 
 $username = mysqli_real_escape_string($conn, $username);
 $user_firstname = mysqli_real_escape_string($conn, $user_firstname);
 $user_lastname = mysqli_real_escape_string($conn, $user_lastname);
 $user_email   =  mysqli_real_escape_string($conn, $user_email);
 $user_password = mysqli_real_escape_string($conn, $user_password);
 $user_address =mysqli_real_escape_string($conn, $user_address);
 $user_group_id=mysqli_real_escape_string($conn,$user_group_id);


 function isRetailerNameExist($userName){

    $db = new DB('PRODUCTS');
    $userNameQuery = "select * from retailers where username = '$userName'";
    $userData = $db->query($userNameQuery);
    return sizeOf($userData);

}

function isRetailerEmailExist($email){

    $db = new DB('PRODUCTS');
    $userNameQuery = "select * from retailers where user_email = '$email'";
    $userData = $db->query($userNameQuery);
    return sizeof($userData);

}
 
 if(isRetailerNameExist($username) === 0 && isRetailerEmailExist($user_email) === 0){
    $query = "INSERT INTO retailers(username, user_password,user_firstname,user_lastname,user_email,user_address,user_group_id) ";
 $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}','{$user_address}','{$user_group_id}') ";
 $register_user_query = mysqli_query($conn, $query);

 header("Location: ./index.php");
 }
 
 else{
    ?>
    
    <script>
    
        alert("Email/Username already exist")

    </script>
    
    <?php
 }

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
                <h1>User Register</h1>
                    <form role="form" action="users_registration.php" method="post" id="login-form" autocomplete="off">
                        
						<div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="user_firstname" class="sr-only">FirstName</label>
                            <input type="text" name="user_firstname" id="user_firstname" class="form-control" placeholder="FirstName">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname" class="sr-only">LastName</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="LastName">
                        </div>
                         <div class="form-group">
                            <label for="user_email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="user_password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div>
						<div class="form-group">
                            <label for="user_address"  class="sr-only">Address</label>
                        
							 <textarea placeholder="Address" name="user_address" id="user_address" class="form-control"></textarea> 
                        </div>
						<div class="form-group"hidden>
                            <label for="user_group_id" class="sr-only">Email</label>
                            <input type="text" name="user_group_id" id="user_group_id" class="form-control" placeholder="groupId" value="1">
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
