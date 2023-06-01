<?php     
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Operatori
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$user = $result->fetch_assoc();
        $ruolo = $user['Ruolo_operatore'];
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
  .button-elimina{
    margin-left: -7px;
  }
</style>

<div>
    <h1> Benvenuto nella tua dashboard, <?= htmlspecialchars($user["Nome"])?></h1>
</div>
</head>
<h3>Gestisci domande obsolete: </h3>

<fieldset>
<?php    
        $sql3 = "SELECT * FROM Domande
                WHERE Stato = 'Rifiutato da esercente' OR Stato = 'Rifiutato da referente'";
        $result3 = mysqli_query($connessione, $sql3);

        if (isset($result3)){
        
            while($row_d=mysqli_fetch_assoc($result3)){

            $id_offerta = $row_d['ID_Offerta'];

            $query2 = "SELECT * FROM Offerte_di_lavoro
                       WHERE ID_Offerta = $id_offerta";
            $result4 = mysqli_query($connessione, $query2);

            while($row=mysqli_fetch_assoc($result4)){
                echo '<div class="riquadro">
                <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nome_azienda</th>
                    <th>Ore</th>
                    <th>Periodo</th>
                    <th>Stipendio</th>
                    <th>Posizione</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>';
                
                echo "<tr>";
                echo "<td>" . $row_d['ID_Domanda'] . "</td>";
                echo "<td>" . $row['Nome_azienda'] . "</td>";
                echo "<td>" . $row['Ore'] . "</td>";
                echo "<td>" . $row['Periodo'] . "</td>";
                echo "<td>" . $row['Stipendio'] . "</td>";
                echo "<td>" . $row['Posizione'] . "</td>";
                echo "<td><form action='aggiornamenti-sito.php' method='POST'>
                <input type='hidden' name='rimosso_d' value='rimosso_d'>
                <input type='hidden' name='id_domanda' value='".$row_d['ID_Domanda']."'>
                <div class='button-elimina'>
                <button type='submit'>Elimina</button>
                </form>
                </body></td>";
                echo "</tr>";
            }
        }
    }
?>
</fieldset>

<h3>Gestisci contratti obsoleti: </h3>

<fieldset>
<?php
        $sql3 = "SELECT * FROM Contratto
                 WHERE Stato = 'Rifiutato dallo studente'";
        $result3 = mysqli_query($connessione, $sql3);
        if (isset($result3)){
            while($row=mysqli_fetch_assoc($result3)){
                echo '<div class="riquadro">
                <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Periodo</th>
                    <th>Posizione</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>';
                
                echo "<tr>";
                echo "<td>" . $row['ID_Contratto'] . "</td>";
                echo "<td>" . $row['Nome'] . "</td>";
                echo "<td>" . $row['Cognome'] . "</td>";
                echo "<td>" . $row['Periodo'] . "</td>";
                echo "<td>" . $row['Posizione'] . "</td>";
                echo "<td><form action='aggiornamenti-sito.php' method='POST'>
                <input type='hidden' name='rimosso_c' value='rimosso_c'>
                <input type='hidden' name='id_contratto' value='".$row['ID_Contratto']."'>
                <div class='button-elimina'>
                <button type='submit'>Elimina</button>
                </form>
                </body></td>";
                echo "</tr>";
            }
        }
?>
</fieldset>