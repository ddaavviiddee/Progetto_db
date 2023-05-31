<?php     
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Studente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$user = $result->fetch_assoc();
        $matricola = $user['Matricola'];

        
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contratti</title>
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
  .button-container {
    width: 100px;
    
  }
  .button-container button {
    width: 120px;
    margin-right: 120px;
    margin-left: -27px;
  }
  .riquadro th{
        background-color: #080f29;
  }
</style>

<div>
    <h2> Ecco i contratti proposti: </h2>
</div>
</head>

<fieldset>
<?php 
    $sql2 = "SELECT * FROM Contratto
             WHERE '$matricola' = Matricola";
    $result2 = mysqli_query($connessione, $sql2);
    
    if (isset($result2)){
        while($row=mysqli_fetch_assoc($result2)){
            $id_esercente = $row['ID_Esercente'];
            $sql3 = "SELECT Nome_azienda, Email_aziendale FROM Esercente
                    WHERE Account_ID = '$id_esercente'";
            $result3 = mysqli_query($connessione, $sql3);
            $array_azienda = mysqli_fetch_assoc($result3);
            $nome_azienda = $array_azienda['Nome_azienda'];
            $email_aziendale = $array_azienda['Email_aziendale'];
            echo '<div class="riquadro">
            <table>
            <thead>
                <tr>
                <th>Azienda</th>
                <th>Email aziendale</th>
                <th>Posizione</th>
                <th>Ore</th>
                <th>Periodo</th>
                <th>Stipendio</th>
                <th>Stato</th>
                <th></th>
                </tr>
            </thead>
            <tbody>';
            echo "<tr>";
            echo "<td>" . $nome_azienda . "</td>";
            echo "<td>" . $email_aziendale . "</td>";
            echo "<td>" . $row['Posizione'] . "</td>";
            echo "<td>" . $row['Ore'] . "</td>";
            echo "<td>" . $row['Periodo'] . "</td>";
            echo "<td>" . $row['Stipendio'] . "</td>";
            echo "<td>" . $row['Stato'] . "</td>";

            if ($row['Stato'] == 'In attesa dello studente' ){
            echo "<td><form action='firma-contratto.php' method='POST'>
            <div class='button-container'>
            <input type='hidden' name='id_domanda' value='".$row['ID_Domanda']."'>
            <input type='hidden' name='id_contratto' value='".$row['ID_Contratto']."'>
            <input type='hidden' name='ore' value='".$row['Ore']."'>
            <input type='hidden' name='posizione' value='".$row['Posizione']."'>
            <input type='hidden' name='stipendio' value='".$row['Stipendio']."'>
            <input type='hidden' name='periodo' value='".$row['Periodo']."'>
            <input type='hidden' name='nome_azienda' value='$nome_azienda'>          
            <button type='submit' name='accetta_s' value='accetta_s'>Accetta</button> 
            <button type='submit' name='rifiuta_s' value='rifiuta_s'>Rifiuta</button>
            </div>
            </form>
            </body></td>";
            echo "</tr>";
            }
            elseif($row['Stato'] == 'Accettato dallo studente'){
            echo "<td><button hidden='hidden' name='' value=''></button> 
                    <button hidden='hidden' name='' value=''></button></td>";

            }
        }
    }
    
?>
</fieldset>

