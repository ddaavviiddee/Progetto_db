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



print_r($_POST);
var_dump($password_hash);



?>
