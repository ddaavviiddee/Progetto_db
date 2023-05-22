<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Esercente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$user = $result->fetch_assoc();

		$nome_azienda = $user["Nome_azienda"];

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
<h1>La tua dashboard</h1>
<h2>Le tue offerte</h2>
<fieldset>
<div class="riquadro">
  <table>
    <thead>
      <tr>
        <th>Azienda</th>
        <th>Ore</th>
		<th>Indirizzo</th>
        <th>Periodo</th>
		<th>Stipendio</th>
        <th>Posti disponibili</th>
		<th>Posizione</th>
      </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM Offerte_di_lavoro
		  WHERE Nome_azienda = '$nome_azienda'";
	$result2 = mysqli_query($connessione, $query);
	while($row=mysqli_fetch_assoc($result2)){
		echo "<tr>";
		echo "<td>" . $row['Nome_azienda'] . "</td>";
        echo "<td>" . $row['Ore'] . "</td>";
		echo "<td>" . $row['Indirizzo'] . "</td>";
        echo "<td>" . $row['Periodo'] . "</td>";
		echo "<td>" . $row['Stipendio'] . "</td>";
        echo "<td>" . $row['Posti_disponibili'] . "</td>";
		echo "<td>" . $row['Posizione'] . "</td>";
        echo "</tr>";

	}
	
?>
 </tbody>
</table>
</div>
</fieldset>







<button onclick="location.href='inserisci-offerta.php'" type="button">Inserisci offerta</button>

</body>
