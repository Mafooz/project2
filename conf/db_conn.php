<?php 
	$conn=mysqli_connect('localhost','Mahfooz','localhost123','project');
	if(mysqli_connect_error()){
		die("Database connection failed: " . mysqli_connect_error());
	}
	else{
		echo "connection successful";
	}
?>