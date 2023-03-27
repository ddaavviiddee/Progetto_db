<?php


if (empty($_POST["nome"])){
    die("Il nome è richiesto.");
}

if (empty($_POST["email"])){
    die("L'E-mail è richiesta.");
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

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$connessione = require __DIR__ . '/db_conn.php';

$sql = "INSERT INTO Utente (Email, Nome, Cognome, Ruolo, password_hash)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $connessione->stmt_init();

if (!$stmt->prepare($sql)){
    die("Errore SQL: ". $connessione->error);
}

$stmt->bind_param("sssss",
                  $_POST["nome"],
                  $_POST["cognome"],
                  $_POST["email"],
                  $_POST["ruolo"],
                  $password_hash);

$stmt->execute();

echo "Registrazione effettuata.";






?>
