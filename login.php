<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $connessione = require __DIR__ . "/db_conn.php";

    $sql = sprintf("SELECT * FROM Account
                    WHERE Email = '%s'", 
                    $connessione->real_escape_string($_POST["email"])); // Il real_escape_string prepara $sql in modo che possa essere utilizzato in una query
    
    $risultato = $connessione->query($sql);  
    
    $user = $risultato->fetch_assoc(); // Prende un record come un array associativo 

    if ($user){
        if (password_verify($_POST["password"], $user["password_hash"])){ // Controllo del login
            
            session_start(); // Entrati nell'account, viene inizializzata o rigenerata la sessione

            session_regenerate_id();

            $_SESSION["user_id"] = $user["ID"]; // Il session id viene preso dal database utilizzando il campo 'ID'

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true; // Se il log in è invalido, questo valore viene riportato in html, dando 'log in invalido' in quanto non è stato effettuato l'exit in riga 27.
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Log in</h1>

    <?php if ($is_invalid): ?>
        <em>Log in invalido.</em>
    <?php endif; ?>

    <form method="post">

        <label for="email"> Email </label>
        <input type="email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password"> Password </label>
        <input type="password" name="password" id="password">

        <button> Log in </button>
    </form>

<div> 
    <p>Non sei registrato? <a href="signup.html"> Clicca qui.</a></p>
</div>

</body>
</html>