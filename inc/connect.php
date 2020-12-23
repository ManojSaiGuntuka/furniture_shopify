<?php


$host = "localhost";
$username = "root";
$password = "";
$dbname = "furniture";

$conn = mysqli_connect($host, $username, $password, $dbname);

/*foreach($db as $key => $value) {
 	 define(strtoupper($key), $value);
}*/

if(!$conn){
	die("Connection was not successful: ".mysqli_connect_error() );
}
?>