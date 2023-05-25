<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Esercente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$esercente = $result->fetch_assoc();

		$nome_azienda = $esercente["Nome_azienda"];

        $sql2 = "SELECT Nome_azienda FROM Offerte_di_lavoro
                 WHERE Nome_azienda = '$nome_azienda'";
        
        $result2 = $connessione->query($sql2);
        $offerta_di_lavoro = $result2->fetch_assoc();

        if (isset($offerta_di_lavoro)){
            $nome_azienda_offerta = $offerta_di_lavoro["Nome_azienda"];
        }
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
<h1>La tua dashboard</h1>
<h2>Le tue offerte</h2>
<?php if (isset($nome_azienda_offerta)): ?>
<fieldset>

<?php endif; ?>

<?php
    if (isset($nome_azienda_offerta)){
        $query = "SELECT * FROM Offerte_di_lavoro
                  WHERE Nome_azienda = '$nome_azienda'";
        $result3 = mysqli_query($connessione, $query);
        while($row=mysqli_fetch_assoc($result3)){
            echo '<div class="riquadro">
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
              <tbody>';
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
	}
    else {
        echo "<h3> Non hai ancora inserito delle offerte di lavoro.</h3>";
    }
?>

</tbody>
</table>
</div>
</fieldset>







<button onclick="location.href='inserisci-offerta.php'" type="button">Inserisci offerta</button>

</body>
