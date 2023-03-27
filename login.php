<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $connessione = require __DIR__ . "/db_conn.php";

    $sql = sprintf("SELECT * FROM Utente
                    WHERE email = '%s'", 
                    $connessione->real_escape_string($_POST["email"]));
    
    $risultato = $connessione->query($sql);  
    
    $user = $risultato->fetch_assoc();

    if ($user){
        if (password_verify($_POST["password"], $user["password_hash"])){
            
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["ID"];

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true; // Capire perché rimane il warning quando si effettua un login fresco.
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

</body>
</html>