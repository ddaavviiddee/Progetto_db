<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Referente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$referente = $result->fetch_assoc();

        $dipartimento = $referente["Dipartimento"];

        if (isset($_POST['accetta'])){
            $accettato = $_POST['accetta'];
        }
        if (isset($_POST['rifiuta'])){
            $rifiutato = $_POST['rifiuta'];
        }
        $matricola = $_POST['matricola'];
	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="index.php" class="Home"> Home </a>
<style>
  .Home {
    position: fixed;
    top: 10px;
    left: 10px;
    padding: 8px 12px;
    background-color: #0076d1;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    border-radius: 4px;
  }
</style>

<?php

if (isset($accettato)){
    echo "<h2> Lo studente è stato accettato.</h2>";
    $sql = "UPDATE Domande
            SET Stato = 'Accettato dal referente'
            WHERE Matricola = '$matricola';";
    $result = mysqli_query($connessione, $sql);
}

if (isset($rifiutato)){
    echo "<h2> Lo studente è stato rifiutato.</h2>";
    $sql = "DELETE FROM Domande
            WHERE Matricola = '$matricola';";
    $result = mysqli_query($connessione, $sql);
}

?>

<button onclick="dashboard-referente.php"> Torna alla tua dashboard</button>
