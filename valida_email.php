<?php

$mysqli = require __DIR__ . "/db_conn.php";

$sql = sprintf("SELECT * FROM Utente
                WHERE Email = '%s'",
                $mysqli->real_escape_string($_GET["email"])); // Prepara per la query
                
$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0; // Questo serve a stabilire se una email è già occupata o meno (ritorna true se non ci sono email prese)

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]); // Effettua un encode in moto che il valore possa essere visto in formato JSON