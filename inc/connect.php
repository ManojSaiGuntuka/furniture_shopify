<?php


$host = "localhost";
$username = "root";
$password = "";
$dbname = "furniture";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection was not successful: ".mysqli_connect_error() );
}
