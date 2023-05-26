<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info-studente</title>
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
    display: flex;
    
  }
  .button-container button {
    margin-right: 90px;
    margin-left: -80px;
  }
</style>
<h1>Valutazione:</h1>
<fieldset>
<legend>Ecco le informazioni riguardo il tuo studente</legend>

<?php

$connessione = require __DIR__ . '/db_conn.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $matricola = $_POST['matricola'];
    
}

$sql = "SELECT * FROM Studente
        WHERE Matricola = '$matricola'";
$result = mysqli_query($connessione, $sql);
while($row=mysqli_fetch_assoc($result)){
  if (!empty($row['Matricola'])){
  echo '<div class="riquadro">
  <table>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Matricola</th>
        <th>Città</th>
      </tr>  
    </thead>
    <tbody>';

  $matricola = $row['Matricola'];
  echo "<tr>";
  echo "<td>" . $row['Nome'] . "</td>";
  echo "<td>" . $row['Cognome'] . "</td>";
  echo "<td>" . $row['Matricola'] . "</td>";
  echo "<td>" . $row['Luogo'] . "</td>";
  echo "<td><form action='valuta-studente.php' method='POST'>
  <div class='button-container'>
  <input type='hidden' name='matricola' value='".$row['Matricola']."'>          
  <button type='submit' name='accetta' value='accetta'>Accetta</button> 
  <button type='submit' name='rifiuta' value='rifiuta'>Rifiuta</button>
  </div>
  </form>
  </body></td>";
  echo "</tr>";

  }
}

?>
