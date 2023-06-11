<?php

session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){

    
	$connessione = require __DIR__ . "/db_conn.php";

	$sql_na = "SELECT * FROM Esercente
			   WHERE Account_ID = {$_SESSION["user_id"]}";

	$result = $connessione->query($sql_na);

	$esercente = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $posizione = $_POST["posizione"];
    $posizione = ucwords($posizione);
    $ore = $_POST['ore'];
    $ore .= ' Settimanali';
    $periodo = $_POST['periodo'];
    $stipendio = $_POST['stipendio'];
    $id_offerta = $_POST['id_offerta'];
    $posti_disponibili = $_POST['posti_disponibili'];
    }
}

// Vengono effettuate le modifiche in base ai parametri selezionati

if (!empty($posizione)){
    $sql = "UPDATE Offerte_di_lavoro SET
            Posizione = '$posizione' WHERE ID_Offerta = $id_offerta;";
    $result = mysqli_query($connessione, $sql);
}

if (!empty($periodo)){
    $sql = "UPDATE Offerte_di_lavoro SET
            Periodo = '$periodo' WHERE ID_Offerta = $id_offerta;";
    $result = mysqli_query($connessione, $sql);
}

if (!empty($stipendio)){
    $sql = "UPDATE Offerte_di_lavoro SET
            Stipendio = $stipendio WHERE ID_Offerta = $id_offerta;";
    $result = mysqli_query($connessione, $sql);
}

if (!empty($ore)){
    $sql = "UPDATE Offerte_di_lavoro SET
            Ore = '$ore' WHERE ID_Offerta = $id_offerta;";
    $result = mysqli_query($connessione, $sql);
}

if (!empty($posti_disponibili)){
    $sql = "UPDATE Offerte_di_lavoro SET
            Posti_disponibili = $posti_disponibili WHERE ID_Offerta = $id_offerta;";
    $result = mysqli_query($connessione, $sql);    
}
                    
header("Location: dashboard-esercente.php");
exit;

?>