<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Referente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$array_referente = $result->fetch_assoc(); 
		$dipartimento = $array_referente["Dipartimento"];

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contratti-studenti</title>
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
    <h2> Ecco i contratti degli studenti del dipartimento <?= htmlspecialchars($dipartimento)?>: </h2>
</div>
</head>

<fieldset>
<?php 

    $query_e = "SELECT Matricola FROM Studente
                WHERE Dipartimento = '$dipartimento'";
                                                            // Riceve le matricole degli studenti appartenenti al proprio dipartimento
    $result_e = mysqli_query($connessione, $query_e);

    while ($row_e=mysqli_fetch_assoc($result_e)){

        $matricola = $row_e['Matricola'];                   

        if (isset($matricola)){                             // Se è presente una matricola nel proprio dipartimento allora vengono stampati i contratti dei propri studenti
                $query = "SELECT * FROM Contratto 
                          WHERE Matricola = '$matricola'";
                $result2 = mysqli_query($connessione, $query);

                $sql_id = "SELECT Account_ID FROM Studente
                           WHERE Matricola = $matricola;";
                $result_id = mysqli_query($connessione, $sql_id);
                $array_id = mysqli_fetch_assoc($result_id);
                $account_id = $array_id['Account_ID'];
                
                $sql_mail = "SELECT Email FROM Account
                            WHERE ID = $account_id;";
                $result_mail = mysqli_query($connessione, $sql_mail);
                $array_mail = mysqli_fetch_assoc($result_mail);
                $email = $array_mail['Email'];

            while($row=mysqli_fetch_assoc($result2)){

                if (!empty($row['Matricola']) && $row['Stato'] == 'Accettato dallo studente'){
                            echo '<div class="riquadro">
                            <table>
                            <thead>
                                <tr>
                                <th>Nome studente</th>
                                <th>Cognome studente</th>
                                <th>Matricola</th>
                                <th>Posizione</th>
                                <th>Ore</th>
                                <th>Periodo</th>
                                <th>Stato</th>
                                <th>Data inizio</th>
                                <th>E-mail studente</th>
                                </tr>
                            </thead>
                            <tbody>';
                            echo "<tr>";
                            echo "<td>" . $row['Nome'] . "</td>";
                            echo "<td>" . $row['Cognome'] . "</td>";
                            echo "<td>" . $row['Matricola'] . "</td>";
                            echo "<td>" . $row['Posizione'] . "</td>";
                            echo "<td>" . $row['Ore'] . "</td>";
                            echo "<td>" . $row['Periodo'] . "</td>";
                            echo "<td>" . $row['Stato'] . "</td>";
                            echo "<td>" . $row['Data_Inizio'] . "</td>";
                            echo "<td>" . $email . "</td>";
                            echo "</tr></table></td>";
                }
            }
        }           // Vengono stampati i contratti
    }
?>
</fieldset> 

<button onclick="goBack()" type="button">Torna indietro</button>

<script>
function goBack() {
  window.history.back(); // Torna alla pagina precedente
}
</script>