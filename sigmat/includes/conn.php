<?php 
	$host="localhost";
	$user="root";
	$pass="";
	$db="sigmat";
	
	$conn= new mysqli($host,$user,$pass,$db);
	
	if(!$conn||$conn->connect_error)
		{
			die("connection failed".mysqli_connect_error());
		}
	//echo "Success";
?>