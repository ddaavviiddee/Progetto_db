<?php

$servername='172.19.0.2'; // Guarda su phpmyadmin che IP inserire
$username='php_docker';
$password='password';
$dbname='php_docker';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connessione fallita: " . $conn->connect_error);

}

return $conn;

?>