<?php     
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Operatori
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$user = $result->fetch_assoc();
        $ruolo = $user['Tipologia'];
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
    margin-left: 13px;
  }
  .button-ripristina{
    margin-left: -2px;
  }
</style>

<div>
    <h1> Benvenuto nella tua dashboard, <?= htmlspecialchars($user["Nome"])?></h1>
</div>
</head>
<h3>Gestisci utenti</h3>

<fieldset>
<?php
        $sql3 = "SELECT Nome, Cognome, Email, Ruolo, Flag, ID FROM Account";
        $result3 = mysqli_query($connessione, $sql3);
        while($row=mysqli_fetch_assoc($result3)){
            echo '<div class="riquadro">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Cognome</th>
                  <th>Email</th>
                  <th>Ruolo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>';
              
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Nome'] . "</td>";
            echo "<td>" . $row['Cognome'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Ruolo'] . "</td>";
            if ($row['Flag'] == 0){
            echo "<td><form action='aggiornamenti-sito.php' method='POST'>
            <input type='hidden' name='rimosso' value='rimosso'>
            <input type='hidden' name='id' value='".$row['ID']."'>
            <div class='button-elimina'>
            <button type='submit'>Elimina</button>";
            }
            if ($row['Flag'] == 1){
                echo "<td><form action='aggiornamenti-sito.php' method='POST'>
                <input type='hidden' name='ripristinato' value='ripristinato'>
                <input type='hidden' name='id' value='".$row['ID']."'>
                <div class='button-ripristina'>
                <button type='submit'>Ripristina</button>";
            }
            echo "</div>
            </form>
            </body></td>";
            echo "</tr>";
        }
?>
</fieldset>