<?php

$host = "localhost";
$user="root";
$password="";
$dbName= "hotel";

$conn = new MySQLi($host,$user,$password,$dbName);

if($conn->error)
{
	die("Database connection error".$conn->connect_error);
}



?>