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
$email_az = $_POST["email_az"];
$dipartimento = $_POST["dipartimento"];
$connessione = require __DIR__ . '/db_conn.php';

if (empty($matricola)){ // Nel momento in cui viene inserito uno di questi campi, gli altri due vengono impostati a null per essere inseriti nel DB.
    $matricola = NULL;
}

if (empty($email_az)){
    $email_az = NULL;
}

if (empty($dipartimento)){
    $dipartimento = NULL;
}

// Query per inserire dentro la tabella account

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);  // Crittografia della password


$sql = "INSERT INTO Account (Email, Nome, Cognome, Ruolo, password_hash)
        VALUES (?, ?, ?, ?, ?)";  // Utilizziamo i ? in modo da evitare SQL injection.

$stmt = $connessione->stmt_init();  // Inizializza uno statement e ritorna un oggetto utile al prepare()

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
}

$stmt->bind_param("sssss",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                  $_POST["email"],
                  $_POST["nome"],
                  $_POST["cognome"],
                  $_POST["ruolo"],
                  $password_hash);


$stmt->execute();

$account_ID = $connessione->insert_id;

$stmt->close();



// Query per inserire le varie informazioni ai 3 utenti

if (isset($matricola)){
    $sql_m = "INSERT INTO Studente (Nome, Cognome, Luogo, Matricola) 
    VALUES (?, ?, ?, ?)";

    $stmt_m = $connessione->stmt_init();

    if (!$stmt_m->prepare($sql_m)){
        die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
    }
    
    $stmt_m->bind_param("sssi",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                      $_POST["nome"],
                      $_POST["cognome"],
                      $_POST["luogo"],
                      $matricola);
    
 
    $stmt_m->execute();
    $stmt_m->close();
}

if (isset($email_az)){
    $sql_e = "INSERT INTO Esercente (Account_ID, Nome, Cognome, Nome_azienda, Email_aziendale) 
    VALUES (?, ?, ?, ?, ?)";
    

    $stmt_e = $connessione->stmt_init();


    if (!$stmt_e->prepare($sql_e)){
        die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
    }
    
    $stmt_e->bind_param("issss",
                        $account_ID,               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                        $_POST["nome"],
                        $_POST["cognome"],
                        $_POST["nome_az"],
                        $email_az);
    
    
    $stmt_e->execute();
    $stmt_e->close();
}

if (isset($dipartimento)){
    $sql_r = "INSERT INTO Referente (Nome, Cognome, Dipartimento) 
    VALUES (?, ?, ?)";
    $stmt_r = $connessione->stmt_init();


    if (!$stmt_r->prepare($sql_r)){
        die("Errore SQL: ". $connessione->error);  // Utilizziamo dei prepared statement per una maggiore efficienza e per proteggere da SQL injection.
    }
    
    $stmt_r->bind_param("sss",               // Questa funzione unisce i parametri alla query, qui la s indica una stringa, la i dei numeri interi.
                      $_POST["nome"],
                      $_POST["cognome"],
                      $dipartimento);
    
    
    $stmt_r->execute();
    $stmt_r->close();
}

                                 // Questa funzione esegue lo statement, per poi mandare alla pagina di successo-registrazione.html
                        
    header("Location: successo-registrazione.html");
    exit;


?>
