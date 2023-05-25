<?php     
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Studente
				WHERE Account_ID = {$_SESSION["user_id"]}";

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

<div>
    <h1> Benvenuto nella tua dashboard, <?= htmlspecialchars($user["Nome"])?></h1>
</div>
</head>
<title>Filtri</title>
    <style>
        .filter-container {
            white-space: nowrap;
            overflow-x: auto;
        }
        .filter {
            display: inline-block;
            margin-right: 5px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h2>Filtri</h2>

    <form action="offerte-filtrate.php" method="post">
        <div class="filter">
            <label for="stipendio">Stipendio:</label>
            <select name="stipendio" id="stipendio">
                <option value=""> </option>
                <option value="crescente">Crescente</option>
                <option value="decrescente">Decrescente</option>
            </select>
        </div>

        <div class="filter">
            <label for="periodo">Periodo:</label>
            <select name="periodo" id="periodo">
                <option value=""> </option>
                <option value="3 mesi">3 mesi</option>
                <option value="6 mesi">6 mesi</option>
                <option value="9 mesi">9 mesi</option>
                <option value="12 mesi">12 mesi</option>
            </select>
        </div>

        <div class="filter">
            <label for="azienda">Azienda:</label>
            <input type="text" name="azienda" id="azienda">
        </div>

        <div class="filter">
            <label for="posizione">Posizione:</label>
            <input type="text" name="posizione" id="posizione">
        </div>

        <br><br>
        
        <input type="submit" value="Filtra">

    </form>

</body>
</head>

</head>
<body>
<h1>Offerte</h1>
<fieldset>
<legend>Ecco tutte le offerte disponibili</legend>

<?php
  $query = "SELECT * FROM Offerte_di_lavoro";
	$result2 = mysqli_query($connessione, $query);
	while($row=mysqli_fetch_assoc($result2)){
        if ($row['Posti_disponibili'] > 0){
        echo '<div class="riquadro">
          <table>
            <thead>
              <tr>
                <th>Azienda</th>
                <th>Stipendio</th>
                <th>Periodo</th>
                <th>Posti disponibili</th>
                <th>Posizione</th>
              </tr>  
            </thead>
            <tbody>';
	    	echo "<tr>";
		    echo "<td>" . $row['Nome_azienda'] . "</td>";
	    	echo "<td>" . $row['Stipendio'] . "</td>";
        echo "<td>" . $row['Periodo'] . "</td>";
        echo "<td>" . $row['Posti_disponibili'] . "</td>";
		    echo "<td>" . $row['Posizione'] . "</td>";
        echo "<td><form action='vedi-offerta.php' method='POST'>          
        <input type='hidden' name='id_offerta' value='".$row['ID_Offerta']."'>
        <button type='submit'>Info</button>
        </form></td>"; // Prende l'id offerta, utile nella pagina vedi offerta.
        echo "</tr>";
        }
	}

?>                    

</tbody>
</table>
</div>
</fieldset>
<form action='vedi-domande.php' >
<button>Vedi le tue domande</button>
</body>


