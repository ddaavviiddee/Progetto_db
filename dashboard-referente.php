<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Referente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$referente = $result->fetch_assoc();

    $dipartimento = $referente["Dipartimento"];

    

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


<div>
    <h1> Benvenuto nella tua dashboard, <?= htmlspecialchars($referente["Nome"])?>.</h1>
</div>
</head>

<h2>Domande effettuate dagli studenti del tuo dipartimento</h2>
<fieldset>
<legend>Ecco tutte le domande</legend>
<?php

  $query_e = "SELECT Matricola FROM Studente
              WHERE Dipartimento = '$dipartimento'";

  $result_e = mysqli_query($connessione, $query_e);

  while ($row_e=mysqli_fetch_assoc($result_e)){
      $matricola = $row_e['Matricola'];
      $query = "SELECT * FROM Domande 
                WHERE Matricola = '$matricola'";
      $result2 = mysqli_query($connessione, $query);
      while($row=mysqli_fetch_assoc($result2)){
            if (!empty($row['Matricola'])){
            echo '<div class="riquadro">
            <table>
              <thead>
                <tr>
                  <th>Azienda</th>
                  <th>Posizione</th>
                  <th>Matricola</th>
                  <th>Stato</th>
                  <th></th>
                </tr>  
              </thead>
              <tbody>';
            echo "<tr>";
            echo "<td>" . $row['Nome_azienda'] . "</td>";
            echo "<td>" . $row['Posizione'] . "</td>";
            echo "<td>" . $row['Matricola'] . "</td>";
            echo "<td>" . $row['Stato'] . "</td>";
              if ($row['Stato'] == 'In attesa'){    // Se lo studente è già stato valutato, non sarà possibile ricliccare su valuta.
              echo "<td><form action='info-studente.php' method='POST'>          
              <input type='hidden' name='matricola' value='".$row['Matricola']."'>
              <input type='hidden' name='azienda' value='".$row['Nome_azienda']."'>
              <input type='hidden' name='posizione' value='".$row['Posizione']."'>
              <button type='submit'>Valuta</button>
              </form></td>"; // Prende la matricola dello studente per chiedergli il colloquio.
              echo "</tr>";
              }
              else{
                echo "<td><button hidden='hidden' name='' value=''></button> 
                      <button hidden='hidden' name='' value=''></button></td>";
  
              }
            }
      }
  }

?>                    

</tbody>
</table>
</div>
</fieldset>
</body>

<button onclick="location.href='contratti-studenti.php'" type="button"> Vedi i contratti dei tuoi studenti</button>