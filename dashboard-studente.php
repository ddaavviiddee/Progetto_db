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
    <h1> Benvenuto nella tua dashboard, <?= htmlspecialchars($user["Nome"])?>.</h1>
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

    <form>
        <div class="filter">
            <label for="stipendio">Stipendio:</label>
            <select name="stipendio" id="stipendio">
                <option value="vuoto"> </option>
                <option value="crescente">Crescente</option>
                <option value="decrescente">Decrescente</option>
            </select>
        </div>

        <div class="filter">
            <label for="periodo">Periodo:</label>
            <select name="periodo" id="periodo">
                <option value="vuoto"> </option>
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

    <div id="risultati">
        <!-- L'area dei risultati verrà aggiornata dinamicamente -->
    </div>
</body>
</head>

</head>
<body>
<h1>Offerte</h1>
<fieldset>
<legend>Ecco le offerte disponibili</legend>
<div class="riquadro">
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
    <tbody>
<?php
    $query = "SELECT * FROM Offerte_di_lavoro";
	$result2 = mysqli_query($connessione, $query);
	while($row=mysqli_fetch_assoc($result2)){
        if ($row['Posti_disponibili'] > 0){
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



<?php
/*
// Connessione al database
$conn = mysqli_connect("localhost", "username", "password", "nomedatabase");

// Verifica la connessione al database
if (!$conn) {
  die("Connessione al database fallita: " . mysqli_connect_error());
}

// Ricevi i valori dei campi di input
$stipendio = $_POST['stipendio'];
$posizione = $_POST['posizione'];
$azienda = $_POST['azienda'];
$periodo = $_POST['periodo'];

// Costruisci la query SQL dinamica
$query = "SELECT * FROM nome_tabella WHERE 1=1"; // Inizia con una clausola WHERE sempre vera

if (!empty($stipendio)) {
  $query .= " AND stipendio = '$stipendio'";
}

if (!empty($posizione)) {
  $query .= " AND posizione = '$posizione'";
}

if (!empty($azienda)) {
  $query .= " AND azienda = '$azienda'";
}

if (!empty($periodo)) {
  $query .= " AND periodo = '$periodo'";
}

// Esegui la query nel database
$result = mysqli_query($conn, $query);

// Visualizza i risultati nella tabella HTML
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>Colonna 1</th><th>Colonna 2</th><th>Colonna 3</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['colonna1'] . "</td>";
    echo "<td>" . $row['colonna2'] . "</td>";
    echo "<td>" . $row['colonna3'] . "</td>";
    echo "</tr>";
  }

  echo "</table>";
} else {
  echo "Nessun risultato trovato.";
}

// Chiudi la connessione al database
mysqli_close($conn);
?>
*/