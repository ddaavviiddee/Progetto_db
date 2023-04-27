<?php

$servername='progetto_db_db_1';
$username='php_docker';
$password='password';
$dbname='php_docker';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connessione fallita: " . $conn->connect_error);

}

return $conn;

?>