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
    <title>Inserisci-offerta</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript/validazione_inserimento.js"></script>
</head>

<body>
<a href="index.php" class="Home"> Home </a>
<style>
  .Home {
    position: fixed;
    top: 10px;
    left: 10px;
    padding: 8px 12px;
    background-color: #0076d1;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    border-radius: 4px;
  }
</style>

<h2>Inserisci i dati della tua offerta di lavoro</h2>

<form action="processo-inserimento.php" method="post" id="inserimento">

        <div>
            <label for="posizione">Posizione</label>
            <input type="text" id="posizione" name="posizione" required>
        </div>

        <div>
        <legend>Periodo:</legend>
        <select id="periodo" name="periodo" >
            <option value="3 mesi">3 mesi </option>
            <option value="6 mesi">6 mesi </option>
            <option value="9 mesi">9 mesi </option>
            <option value="12 mesi">12 mesi </option>
        </select>  
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
            <label for="posti_disponibili">Posti disponibili</label required>
            <input type="text" id="posti_disponibili" name="posti_disponibili">
        </div>

        
        
        
        <button>Inserisci offerta</button>
       
    
    </form>




</body>