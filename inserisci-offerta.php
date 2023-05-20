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
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript/validazione_inserimento.js"></script>
</head>

<body>

<h2>Inserisci i dati della tua offerta di lavoro</h2>

<form action="processo-inserimento.php" method="post" id="inserimento">

        <div>
            <label for="id_azienda">ID_azienda</label>
            <input type="text" id="id_azienda" name="id_azienda" required>
        </div>

        <div>
            <label for="nome_azienda">Nome_azienda</label>
            <input type="text" id="nome_azienda" name="nome_azienda" required>
        </div>

        <div>
            <label for="posizione">Posizione</label>
            <input type="text" id="posizione" name="posizione" required>
        </div>

        <div>
            <label for="periodo">Periodo</label>
            <input type="text" id="periodo" name="periodo" required>
        </div>        

        <div>
            <label for="stipendio">Stipendio</label>
            <input type="text" id="stipendio" name="stipendio" required>
        </div>

        <div>
            <label for="indirizzo">Indirizzo</label required>
            <input type="text" id="indirizzo" name="indirizzo">
        </div>

        <div>
            <label for="ore">Ore</label required>
            <input type="text" id="ore" name="ore">
        </div>

        <div>
            <label for="posti_disponibili">Posti_disponibil</label required>
            <input type="text" id="posti_disponibili" name="posti_disponibili">
        </div>

        
        
        
        <button>Inserisci offerta</button>
       
    
    </form>




</body>