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

    $nome_azienda = ucwords($nome_azienda);
    $posizione = $_POST["posizione"];
    $posizione = ucwords($posizione);
    $indirizzo = $_POST["indirizzo"];
    $indirizzo = ucwords($indirizzo);
    $ore = $_POST["ore"];
    $ore .= ' Settimanali';
    $periodo = $_POST["periodo"];
    $stipendio = $_POST["stipendio"];

    $sql_check = "SELECT Posti_disponibili FROM Offerte_di_lavoro
                  WHERE  Nome_azienda = '$nome_azienda' AND Posizione = '$posizione'
                  AND Ore = '$ore' AND Periodo = '$periodo' AND Stipendio = '$stipendio';";
                  
    $result_check = mysqli_query($connessione, $sql_check);

    if (isset($result_check)){
        $offerta = mysqli_fetch_assoc($result_check);
        if (isset($offerta)){
            $posti_disponibili_esistenti = $offerta['Posti_disponibili'];
        }
    }
    else{
        $posti_disponibili_esistenti = 0;
    }
    
    $posti_disponibili = $_POST["posti_disponibili"];
    
    if (isset($posti_disponibili_esistenti)){
        $posti_disponibili += $posti_disponibili_esistenti;
    }

    $sql_del = "DELETE FROM Offerte_di_lavoro WHERE Nome_azienda = '$nome_azienda' AND Posizione = '$posizione'
    AND Ore = '$ore' AND Periodo = '$periodo' AND Stipendio = '$stipendio';";
    $result_del = mysqli_query($connessione, $sql_del);

}


$sql = "INSERT INTO Offerte_di_lavoro (Nome_azienda, Ore, Indirizzo, Periodo, Stipendio, Posti_disponibili, Posizione)
        VALUES (?, ?, ?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

$stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
}

$stmt->bind_param("ssssiis",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                  $nome_azienda,
                  $ore,
                  $indirizzo,
                  $periodo,
                  $stipendio,  
                  $posti_disponibili,
                  $posizione);
                  

if ($stmt->execute()){                                   
                        
    header("Location: dashboard-esercente.php");
    exit;

}
