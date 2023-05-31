<?php
	
	session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Account
				WHERE ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$user = $result->fetch_assoc();
		if (isset($user['Flag'])){
			$flag = $user['Flag'];
		}

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

		<?php if (isset($user) && $flag == 0) : ?>

		<h3>Ciao <?= htmlspecialchars($user["Nome"])?></h3>

		<?php if (htmlspecialchars($user["Ruolo"]) == "Amministratore"): ?>
		
		<p>Accedi alla tua <a href="dashboard-amministratore.php">dashboard</a></p>
		<?php endif; ?>

		<?php if (htmlspecialchars($user["Ruolo"]) == "Moderatore"): ?>
		
		<p>Accedi alla tua <a href="dashboard-moderatore.php">dashboard</a></p>
		<?php endif; ?>
		
		<?php if (htmlspecialchars($user["Ruolo"]) == "Studente"): ?>
		
		<p>Accedi alla tua <a href="dashboard-studente.php">dashboard</a></p>
		<?php endif; ?>

		<?php if (htmlspecialchars($user["Ruolo"]) == "Esercente"): ?>
		
		<p>Accedi alla tua <a href="dashboard-esercente.php">dashboard</a></p>
		<?php endif; ?>

		<?php if (htmlspecialchars($user["Ruolo"]) == "Referente"): ?>
		
		<p>Accedi alla tua <a href="dashboard-referente.php">dashboard</a></p>
		<?php endif; ?>

		
		
		<footer><a href="logout.php">Log out</a></footer>
	
	<?php elseif(isset($flag) && $flag == 1): ?>
		<h2>Ci dispiace, ma il tuo account è stato sospeso.</h2>
		
	<?php else: ?>
		<p>Effettua il<a href="login.php"> log in</a> oppure <a href="signup.html"> registrati.</a></p>
	<?php endif; ?>
	
	


</body>
</html>