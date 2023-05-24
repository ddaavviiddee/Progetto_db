<?php

if (empty($_POST["posizione"])){
    die("La posizione è richiesta.");
}

if (empty($_POST["periodo"])){
    die("Il periodo è richiesta.");
}

if (empty($_POST["stipendio"])){
    die("inserire uno stipendio.");
}

if (empty($_POST["indirizzo"])){
    die("L'indirizzo è richisto.");
}

if (empty($_POST["ore"])){
    die("Le ore di lavoro sono richieste.");
}

if (empty($_POST["posti_disponibili"])){
    die("Inserire i posti disponibili.");
}

$connessione = require __DIR__ . '/db_conn.php';


session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){

	$connessione = require __DIR__ . "/db_conn.php";

	$sql_na = "SELECT * FROM Esercente
			WHERE Account_ID = {$_SESSION["user_id"]}";

	$result = $connessione->query($sql_na);

	$esercente = $result->fetch_assoc();

	$nome_azienda = $esercente["Nome_azienda"];

}


$sql = "INSERT INTO Offerte_di_lavoro (Nome_azienda, Ore, Indirizzo, Periodo, Stipendio, Posti_disponibili, Posizione)
        VALUES (?, ?, ?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

$stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
}

$stmt->bind_param("ssssiis",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                  $nome_azienda,
                  $_POST["ore"],
                  $_POST["indirizzo"],
                  $_POST["periodo"],
                  $_POST["stipendio"],  
                  $_POST["posti_disponibili"],
                  $_POST["posizione"]);
                  

if ($stmt->execute()){                                   
                        
    header("Location: dashboard-esercente.php");
    exit;

}
