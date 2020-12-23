
<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<title>Clickrippleapp </title>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  

  <?php  

	  
	require_once("inc/connect.php");
	

				$query = "SELECT * FROM category";
				$select_all_categories_query = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($select_all_categories_query)){
				$cat_title = $row['cat_title'];
				$cat_id = $row['cat_id'];
				echo "<li> <a href='search_caregory.php?categories=$cat_id'>{$cat_title} </a></li>";
				}			
				
	?>

  <li><a href="login.php">Admin Login</a></li>
  <li><a <a href="registration.php">Registration</a></li>
  <li><a href="users_login.php">User Login</a></li>
  <li><a <a href="users_registration.php">User Registration</a></li>
 
</ul>

</body>
</html>



