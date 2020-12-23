<?php include "inc/connect.php"; ?>
<?php session_start(); ?>
<?php

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];


    $username = mysqli_real_escape_string($conn ,$username);
    $user_password = mysqli_real_escape_string($conn ,$user_password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($conn, $query);
  if(!$select_user_query){
 
      die("QUERY FAILED". mysqli_error($conn));
  }

  $row = mysqli_fetch_array($select_user_query);
  
  $db_id = $row['user_id']; 
  $db_username = $row['username'];
  $db_user_password = $row['user_password']; 

 //$password = crypt($password, $db_user_password);

 if($username === $db_username && $user_password === $db_user_password){
 
      $_SESSION['username'] = $db_username;
      $_SESSION['user_id'] = $db_id;
        
      header("Location: ./users/home.php");

        }
    else {
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
  <h2> Users Login </h2>
  <br> <br>
   
  <form method="post" action="users_login.php">  
  <p>
    <label>Username: </label>
	<input type="text" id="username" name = "username"/>
	</p> 
    
	<p>
    <label>Password:  </label> 
	<input type="password" id="user_password" name = "user_password"/>
	</p> 
  
  <br><br>
  <input type="submit" id="login" name = "login" value="Login">  

</form>
</hr>
<p>  Don't have an account? &nbsp;&nbsp; <a href="users_registration.php"> Register Now! </a></p>
</div>


</body>
</html>