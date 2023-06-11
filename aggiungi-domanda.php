<?php

$connessione = require __DIR__ . '/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_azienda = $_POST['nome_azienda'];         // Si prendono le informazioni dell'offerta di lavoro tramite post
    $ore  = $_POST['ore'];
    $indirizzo = $_POST['indirizzo'];
    $periodo = $_POST['periodo'];
    $stipendio = $_POST['stipendio'];
    $posti_disponibili = $_POST['posti_disponibili'];
    $posizione = $_POST['posizione'];
    $matricola = $_POST['matricola'];
    $id_offerta = $_POST['id_offerta'];
    $id_esercente = $_POST['id_esercente'];
    $stato = 'In attesa';

}

$commento = '';
$sql = "INSERT INTO Domande (ID_Offerta, ID_Esercente, Stato, Matricola, Commento)
        VALUES (?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

$stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
}

$stmt->bind_param("iisis",
                  $id_offerta,               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                  $id_esercente,
                  $stato,
                  $matricola,
                  $commento);
                  

$stmt->execute();
$stmt->close();                                
                        

header("Location: dashboard-studente.php");
exit;



?>