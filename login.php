<?php include "inc/connect.php"; ?>
<?php session_start(); ?>
<?php

if(isset($_POST['login'])){
 $adminName = $_POST['adminName'];
 $password = $_POST['password'];


 $adminName = mysqli_real_escape_string($conn ,$adminName);
 $password = mysqli_real_escape_string($conn ,$password);

 $query = "SELECT * FROM admin WHERE adminName = '{$adminName}'";
 $select_user_query = mysqli_query($conn, $query);
 if(!$select_user_query){
 
 die("QUERY FAILED". mysqli_error($conn));
 }

 while($row = mysqli_fetch_array($select_user_query)){
 
 $db_id = $row['adminId']; 
 $db_username = $row['adminName'];
 $db_user_password = $row['password']; 
 
 }
 //$password = crypt($password, $db_user_password);

 if($adminName === $db_username && $password === $db_user_password){
 
 $_SESSION['adminName'] = $db_username;

	 
 header("Location: ./admin/admin_index.php");

  }else {
  header("Location: login.php");
}


}

?>

<!DOCTYPE html>
<html>
<head>

<title> Shopify ClickrippleApp </title>
<link rel = "stylesheet" type = "text/css" href = "css/style.css">
</head>
<body>

  <div id= form>
  <h2> Login </h2>
  <br> <br>
   
  <form method="post" action="login.php">  
  <p>
    <label>Username: </label>
	<input type="text" id="adminName" name = "adminName"/>
	</p> 
    
	<p>
    <label>Password:  </label> 
	<input type="password" id="password" name = "password"/>
	</p> 
  
  <br><br>
  <input type="submit" id="login" name = "login" value="Login">  

</form>
</hr>
<p>  Don't have an account? &nbsp;&nbsp; <a href="registration.php"> Register Now! </a></p>
</div>


</body>
</html>