<?php
	$host = "localhost";
	$username = "php_docker";
	$password = "";
	$dbname = "php_docker";
	
	$mysqli = new mysqli(hostname: $host, 
						 username: $username, 
						 password: $password,
						 database: $dbname);
	
	if ($mysqli->connect_errno){
		die("Errore di connessione: ". $mysqli->connect_error);
	}
	
	return $mysqli;
?>