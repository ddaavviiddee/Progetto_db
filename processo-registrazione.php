<?php
// Validazione server-side
if (empty($_POST["nome"])){
    die("Il nome è richiesto.");
}

if (empty($_POST["cognome"])){
    die("Il cognome è richiesto.");
}

if (empty($_POST["email"])){
    die("L'E-mail è richiesta.");
}

if (empty($_POST["ruolo"])){
    die("Selezionare un ruolo.");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("E' richiesta una E-mail valida.");
}

if(strlen($_POST["password"]) < 8){
    die("La password deve essere almeno di 8 caratteri.");
}

if(!preg_match("/[0-9]/", $_POST["password"])) {
    die("La password deve contenere almeno un numero.");
}


if($_POST["password"] !== $_POST["conferma_password"]){
    die("Le password devono esssere uguali.");
}

$matricola = $_POST["matricola"];
$id_azienda = $_POST["id_azienda"];
$id_universita = $_POST["id_universita"];

if (empty($matricola)){ // Nel momento in cui viene inserito uno di questi campi, gli altri due vengono impostati a null per essere inseriti nel DB.
    $matricola = NULL;
}

if (empty($id_azienda)){
    $id_azienda = NULL;
}

if (empty($id_universita)){
    $id_universita = NULL;
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);  // Crittografia della password

$connessione = require __DIR__ . '/db_conn.php';

$sql = "INSERT INTO Utente (Email, Nome, Cognome, Ruolo, Matricola, id_azienda, id_universita, password_hash)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

$stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
}

$stmt->bind_param("ssssiiis",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                  $_POST["email"],
                  $_POST["nome"],
                  $_POST["cognome"],
                  $_POST["ruolo"],
                  $matricola,  // Il post viene fatto in precedenza.
                  $id_azienda,
                  $id_universita,
                  $password_hash);

if ($stmt->execute()){                                   // Questa funzione esegue lo statement, per poi mandare alla pagina di successo-registrazione.html
                        
    header("Location: successo-registrazione.html");
    exit;

}











?>
