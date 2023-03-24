<?php
	$servername = "localhost";
	$username = "php_docker";
	$password = "password";
	$dbname = "php_docker";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>