<?php
	
	session_start();
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Utente
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
		<p><a href="logout.php">Log out</a></p>

	<?php else: ?>
		<p>Effettua il<a href="login.php"> log in</a> oppure <a href="signup.html"> registrati.</a></p>
	<?php endif; ?>



</body>
</html>