<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT Matricola FROM Studente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$studente = $result->fetch_assoc();

		$matricola = $studente["Matricola"];

        $sql2 ="SELECT * FROM Domande
                WHERE Matricola = '$matricola'";
        $result2 = $connessione->query($sql2);
        $studente_d = $result2->fetch_assoc();

        if (isset($studente_d)){
        $matricola_d = $studente_d['Matricola'];
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
  .riquadro th{
    background-color: #080f29;
  }
</style>

<?php if (isset($matricola_d)): ?>

<fieldset>


<?php endif; ?>

<?php
    if (isset($matricola_d)){
        $query = "SELECT * FROM Domande
                  WHERE Matricola = '$matricola'";
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
                  <th>Posizione</th>
                  <th>Stato</th>
                  <th>Commento</th>
                </tr>
              </thead>
              <tbody>';
            echo "<tr>";
            echo "<td>" . $row['Nome_azienda'] . "</td>";
            echo "<td>" . $row['Ore'] . "</td>";
            echo "<td>" . $row['Indirizzo'] . "</td>";
            echo "<td>" . $row['Periodo'] . "</td>";
            echo "<td>" . $row['Stipendio'] . "</td>";
            echo "<td>" . $row['Posizione'] . "</td>";
            echo "<td>" . $row['Stato'] . "</td>";
            echo "<td>" . $row['Commento'] . "</td>";
            echo "</tr>";
        }
	}
    else {
        echo "<h3> Non hai ancora effettuato domande.</h3>";
    }




?>