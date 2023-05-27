<?php

$connessione = require __DIR__ . '/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_azienda = $_POST['nome_azienda'];
    $ore  = $_POST['ore'];
    $indirizzo = $_POST['indirizzo'];
    $periodo = $_POST['periodo'];
    $stipendio = $_POST['stipendio'];
    $posti_disponibili = $_POST['posti_disponibili'];
    $posizione = $_POST['posizione'];
    $matricola = $_POST['matricola'];
    $id_offerta = $_POST['id_offerta'];
    $stato = 'In attesa';
}


$sql = "INSERT INTO Domande (Nome_azienda, Ore, Indirizzo, Periodo, Stipendio, Posizione, Stato, Matricola)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

$stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
}

$stmt->bind_param("ssssissi",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                  $nome_azienda,
                  $ore,
                  $indirizzo,
                  $periodo,
                  $stipendio,
                  $posizione,
                  $stato,
                  $matricola);
                  

$stmt->execute();
$stmt->close();                                
                        

header("Location: dashboard-studente.php");
exit;



?>