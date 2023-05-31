<?php

session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){

    
	$connessione = require __DIR__ . "/db_conn.php";

	$sql_na = "SELECT * FROM Esercente
			   WHERE Account_ID = {$_SESSION["user_id"]}";

	$result = $connessione->query($sql_na);

	$esercente = $result->fetch_assoc();
    $id_esercente = $esercente['Account_ID'];

    if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    $id_domanda = $_POST["id_domanda"];
    $sql = "UPDATE Domande SET Stato = 'Accettato da esercente'
            WHERE ID_Domanda = $id_domanda";
    $result = mysqli_query($connessione, $sql);
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $matricola = $_POST["matricola"];
    $posizione = $_POST["posizione"];

    $sql2 = "SELECT Periodo, Stipendio, Ore FROM Domande
            WHERE ID_Domanda = $id_domanda";
    $result2 = mysqli_query($connessione, $sql2);
    $array_domanda = mysqli_fetch_assoc($result2);
    $periodo = $array_domanda['Periodo'];
    $stipendio = $array_domanda['Stipendio'];
    $ore = $array_domanda['Ore'];
    $ore .= ' Settimanali';
    }
}

$stato = 'In attesa dello studente';

if (isset($_POST['confermato'])){
    $sql = "INSERT INTO Contratto (Matricola, ID_Esercente, ID_Domanda, Nome, Cognome, Periodo, Ore, Stipendio, Posizione, Stato)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

    $stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

        if (!$stmt->prepare($sql)){
            die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
        }

        $stmt->bind_param("iiisssiiss",
                        $matricola,
                        $id_esercente,
                        $id_domanda,               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                        $nome,
                        $cognome,
                        $periodo,
                        $ore,
                        $stipendio,
                        $posizione,
                        $stato);
        $stmt->execute();
        $stmt->close(); 
}

if (isset($_POST['modificato'])){

        if (!empty($_POST['periodo'])){
        $periodo = $_POST['periodo'];
        }
        if (!empty($_POST['stipendio'])){
        $stipendio = $_POST['stipendio'];
        } 
        if (!empty($_POST['ore'])){
        $ore = $_POST['ore'];
        }
        $sql = "INSERT INTO Contratto (Matricola, ID_Esercente, ID_Domanda, Nome, Cognome, Periodo, Ore, Stipendio, Posizione, Stato)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

        $stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

        if (!$stmt->prepare($sql)){
            die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
        }

        $stmt->bind_param("iiisssiiss",
                        $matricola,               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                        $id_esercente,
                        $id_domanda,
                        $nome,
                        $cognome,
                        $periodo,
                        $ore,
                        $stipendio,
                        $posizione,
                        $stato);
        $stmt->execute();
        $stmt->close(); 
}


                    
header("Location: dashboard-esercente.php");
exit;

?>