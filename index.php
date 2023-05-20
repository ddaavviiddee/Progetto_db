<?php
	
	session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Account
				WHERE ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$user = $result->fetch_assoc();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AccaJob</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<body>

    <h1>AccaJob</h1>

	<?php if (isset($user)): ?>

		<p>Sei loggato.</p>
		<p>Ciao <?= htmlspecialchars($user["Nome"]) ?>.</p>
		
		<?php if (htmlspecialchars($user["Ruolo"]) == "Studente"): ?>
		
		<p>Accedi alla tua <a href="dashboard-studente.php">dashboard</a></p>
		<?php endif; ?>

		<?php if (htmlspecialchars($user["Ruolo"]) == "Esercente"): ?>
		
		<p>Accedi alla tua <a href="dashboard-esercente.php">dashboard</a></p>
		<?php endif; ?>

		<?php if (htmlspecialchars($user["Ruolo"]) == "Referente"): ?>
		
		<p>Accedi alla tua <a href="dashboard-referente.php">dashboard</a></p>
		<?php endif; ?>

		
		
		<p><a href="logout.php">Log out</a></p>
		
	<?php else: ?>
		<p>Effettua il<a href="login.php"> log in</a> oppure <a href="signup.html"> registrati.</a></p>
	<?php endif; ?>



</body>
</html>