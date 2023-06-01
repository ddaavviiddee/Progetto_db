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
  .commento {
    margin-left: -80px;
    position: relative;
    height: 150px;
    margin-top: 0px;
  }
  .riquadro{
    height: auto;
    overflow: hidden;
  }
  label {
    position: absolute;
    top: 0;
  }
  textarea {
    resize: none;
    height: 100%;
    width: 100%;
  }
  .riquadro th{
    background-color: #080f29;
  }
</style>
<script>

function checkCharacterLimit(textarea) {
  const maxLength = 100; //Numero massimo di caratteri
  const label = textarea.previousElementSibling;
  
  if (textarea.value.length > maxLength) {
    textarea.value = textarea.value.slice(0, maxLength); // Ferma l'inserimento di caratteri una volta arrivati al massimo
  }

  // Permette lo scorrimento del commento
  label.style.height = textarea.scrollHeight + 'px';
}

</script>
<h1>Valutazione:</h1>
<fieldset>
<legend>Ecco le informazioni riguardo il tuo studente</legend>

<?php

$connessione = require __DIR__ . '/db_conn.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $matricola = $_POST['matricola'];
    $posizione = $_POST['posizione'];
    $nome_azienda = $_POST['azienda'];
    $id_domanda = $_POST['id_domanda'];
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
        <th></th>
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
  <input type='hidden' name='matricola' value='".$matricola."'>
  <input type='hidden' name='id_domanda' value='$id_domanda'>           
  <button type='submit' name='accetta_r' value='accetta_r'>Accetta</button> 
  <button type='submit' name='rifiuta_r' value='rifiuta_r'>Rifiuta</button>
  </div>
  <div class='commento'>
      <p>Inserisci un commento:</p>
      <label for='my-textarea'></label required>
      <textarea input type='text' id='commento' name='commento' oninput='autoResize(this)'></textarea>   
  </div>
  </form>
  </body></td>";
  echo "</tr>";

  }
}

?>
