<?php
if (empty($_POST["nome_azienda"])){
    die("Il nome dell'azienda è richiesto.");
}

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

$sql = "INSERT INTO Offerte_di_lavoro (Nome_azienda, Ore, Indirizzo, Periodo, Stipendio, Posti_disponibili, Posizione)
        VALUES (?, ?, ?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

$stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
}

$stmt->bind_param("ssssiis",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                  $_POST["nome_azienda"],
                  $_POST["ore"],
                  $_POST["indirizzo"],
                  $_POST["periodo"],
                  $_POST["stipendio"],  // Il post viene fatto in precedenza.
                  $_POST["posti_disponibili"],
                  $_POST["posizione"]);
                  

if ($stmt->execute()){                                   // Questa funzione esegue lo statement, per poi mandare alla pagina di successo-registrazione.html
                        
    header("Location: dashboard-esercente.php");
    exit;

}
