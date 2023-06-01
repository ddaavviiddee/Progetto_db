<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";


		$sql = "SELECT Ruolo FROM Account
				WHERE ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

        if (isset($_POST['accetta_r'])){
            $accettato_r = $_POST['accetta_r'];
        }
        if (isset($_POST['rifiuta_r'])){
            $rifiutato_r = $_POST['rifiuta_r'];
        }

        $matricola = $_POST['matricola'];
        $id_domanda = $_POST['id_domanda'];

	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valuta-studente</title>
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

if (isset($accettato_r)){
    echo "<h2> Lo studente è stato accettato.</h2>";
    if (isset($_POST["commento"])){
        $commento = $_POST["commento"];
        $commento = mysqli_real_escape_string($connessione, $_POST["commento"]);
        }else{
            $commento = '';
        }
    $sql = "UPDATE Domande
            SET Stato = 'Accettato dal referente', Commento = '$commento'
            WHERE ID_Domanda = $id_domanda;";
    $result = mysqli_query($connessione, $sql);
}

if (isset($rifiutato_r)){
    if (isset($_POST["commento"])){
        $commento = $_POST["commento"];
        $commento = mysqli_real_escape_string($connessione, $_POST["commento"]);
        }else{
            $commento = '';
        }
    echo "<h2> Lo studente è stato rifiutato.</h2>";
    $sql = "UPDATE  Domande
            SET Stato = 'Rifiutato da referente', Commento = '$commento'
            WHERE ID_Domanda = $id_domanda;";
    $result = mysqli_query($connessione, $sql);
}

?>

<button onclick="location.href='dashboard-referente.php'" type="button">Torna alla tua dashboard</button>
