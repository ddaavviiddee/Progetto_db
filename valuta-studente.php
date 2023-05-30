<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";


		$sql = "SELECT Ruolo FROM Account
				WHERE ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);
        $array_ruolo = $result->fetch_assoc();
        $ruolo = $array_ruolo['Ruolo'];

        if ($ruolo == 'Esercente'){
        $sql2 = "SELECT * FROM Esercente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result2 = $connessione->query($sql2);

		$esercente = $result2->fetch_assoc();

        $nome_azienda = $esercente["Nome_azienda"];
        }
        else{
            $nome_azienda = $_POST["azienda"];
        }

        if (isset($_POST['accetta_e'])){
            $accettato_e = $_POST['accetta_e'];
        }
        if (isset($_POST['rifiuta_e'])){
            $rifiutato_e = $_POST['rifiuta_e'];
        }

        if (isset($_POST['accetta_r'])){
            $accettato_r = $_POST['accetta_r'];
        }
        if (isset($_POST['rifiuta_r'])){
            $rifiutato_r = $_POST['rifiuta_r'];
        }

        $matricola = $_POST['matricola'];
        $posizione = $_POST['posizione'];

        $sql3 = "SELECT * FROM Domande
        WHERE Matricola = '$matricola' AND Nome_azienda = '$nome_azienda'
        AND Posizione = '$posizione'";

        $result3 = $connessione->query($sql3);

        $domande = $result3->fetch_assoc();

        $ore = $domande["Ore"];
        $periodo = $domande["Periodo"];
        $stipendio = $domande["Stipendio"];
        $id_domanda = $domande["ID_Domanda"];

        

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
    $commento = $_POST["commento"];
    $commento = mysqli_real_escape_string($connessione, $_POST["commento"]);
    $sql = "UPDATE Domande
            SET Stato = 'Accettato dal referente', Commento = '$commento'
            WHERE ID_Domanda = $id_domanda;";
    $result = mysqli_query($connessione, $sql);
}

if (isset($accettato_e)){
    $commento = $_POST["commento"];
    $commento = mysqli_real_escape_string($connessione, $_POST["commento"]);
    echo "<h2> Lo studente è stato accettato.</h2>";
    $sql = "UPDATE Domande
            SET Stato = 'Accettato da esercente'
            WHERE ID_Domanda = $id_domanda;";
    $result = mysqli_query($connessione, $sql);

    $sql_u = "UPDATE Offerte_di_lavoro 
              SET Posti_disponibili = Posti_disponibili - 1 
              WHERE  Nome_azienda = '$nome_azienda' AND Posizione = '$posizione'
              AND Ore = '$ore' AND Periodo = '$periodo' AND Stipendio = '$stipendio';";
    $result_u = mysqli_query($connessione, $sql_u);
}

if (isset($rifiutato_r)){
    $commento = $_POST["commento"];
    $commento = mysqli_real_escape_string($connessione, $_POST["commento"]);
    echo "<h2> Lo studente è stato rifiutato.</h2>";
    $sql = "UPDATE  Domande
            SET Stato = 'Rifiutato da referente', Commento = '$commento'
            WHERE ID_Domanda = '$id_domanda';";
    $result = mysqli_query($connessione, $sql);
}
if (isset($rifiutato_e)){
    $commento = $_POST["commento"];
    $commento = mysqli_real_escape_string($connessione, $_POST["commento"]);
    echo "<h2> Lo studente è stato rifiutato.</h2>";
    $sql = "UPDATE  Domande
            SET Stato = 'Rifiutato da esercente', Commento = '$commento'
            WHERE ID_Domanda = '$id_domanda';";
    $result = mysqli_query($connessione, $sql);
}


?>
<?php if (htmlspecialchars($ruolo) == "Esercente"): ?>
<button onclick="location.href='dashboard-esercente.php'" type="button">Torna alla tua dashboard</button>
<?php endif; ?>
<?php if (htmlspecialchars($ruolo) == "Referente"): ?>
<button onclick="location.href='dashboard-referente.php'" type="button">Torna alla tua dashboard</button>
<?php endif; ?>