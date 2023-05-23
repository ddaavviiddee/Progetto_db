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

<div>
    <h1> Benvenuto nella tua dashboard, <?= htmlspecialchars($user["Nome"])?>.</h1>
</div>
<fieldset>
<legend>Ecco le offerte disponibili</legend>
<div class="riquadro">
  <table>
    <thead>
      <tr>
        <th>Azienda</th>
		<th>Indirizzo</th>
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
		echo "<tr>";
		echo "<td>" . $row['Nome_azienda'] . "</td>";
		echo "<td>" . $row['Indirizzo'] . "</td>";
        echo "<td>" . $row['Periodo'] . "</td>";
        echo "<td>" . $row['Posti_disponibili'] . "</td>";
		echo "<td>" . $row['Posizione'] . "</td>";
        echo "<td><form action='vedi-offerta.php' method='POST'>          
        <input type='hidden' name='id_offerta' value='".$row['ID_Offerta']."'>
        <button type='submit'>Info</button>
        </form></td>"; // Prende l'id offerta, utile nella pagina vedi offerta.
        echo "</tr>";
        
	}
	
?>

</tbody>
</table>
</div>
</fieldset>
</body>
