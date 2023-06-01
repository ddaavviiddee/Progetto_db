<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>formazione-contratto</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
<a href='index.php' class='Home'> Home </a>
<style>
  .Home {
    position: fixed;
    top: 10px;
    left: 10px;
    padding: 8px 10px;
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

<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  $connessione = require __DIR__ . "/db_conn.php";
  $id_domanda = $_POST['id_domanda'];
  $sql = "SELECT Matricola, ID_Offerta FROM Domande 
          WHERE ID_Domanda = $id_domanda;";

  $result = mysqli_query($connessione, $sql);
  $array_domanda = mysqli_fetch_assoc($result);

  $matricola = $array_domanda["Matricola"];
  $id_offerta = $array_domanda["ID_Offerta"];
  
  $sql_offerta = "SELECT * FROM Offerte_di_lavoro
            WHERE ID_Offerta = $id_offerta;";
  
  $result_offerta = mysqli_query($connessione, $sql_offerta);
  $array_offerta = mysqli_fetch_assoc($result_offerta);
  
  $posizione = $array_offerta["Posizione"];
  $ore = $array_offerta["Ore"];
  $periodo = $array_offerta["Periodo"];
  $stipendio = $array_offerta["Stipendio"];

  $sql2 = "SELECT Nome, Cognome FROM Studente
           WHERE Matricola = $matricola;";
  $result2 = mysqli_query($connessione, $sql2);
  $array_studente = mysqli_fetch_assoc($result2);
  $nome = $array_studente["Nome"];
  $cognome = $array_studente["Cognome"];

  if(isset($_POST['accetta_e'])){
  $accettato_e = $_POST['accetta_e'];
  }
  if (isset($_POST['rifiuta_e'])){
  $rifiutato_e = $_POST['rifiuta_e'];
  }
  
}



if (isset($accettato_e)){
  echo "<h3>Se desidera, può modificare il contratto</h3>";
  echo "<form action='processo-contratto.php' method='POST' id='inserimento'>
      <input type='hidden' name='id_domanda' value='".$id_domanda."'>
      <input type='hidden' name='id_offerta' value='".$id_offerta."'>
      <input type='hidden' name='matricola' value='".$matricola."'>
      <input type='hidden' name='nome' value='".$nome."'>
      <input type='hidden' name='cognome' value='".$cognome."'>
      <input type='hidden' name='posizione' value='".$posizione."'>
      <input type='hidden' name='modificato' value='modificato'>

        <div>
        <legend>Periodo:</legend>
        <select id='periodo' name='periodo' >
            <option value=''> </option>
            <option value='3 mesi'>3 mesi </option>
            <option value='6 mesi'>6 mesi </option>
            <option value='9 mesi'>9 mesi </option>
            <option value='12 mesi'>12 mesi </option>
        </select>  
        </div>

        <div>
            <label for='stipendio'>Stipendio</label>
            <input type='text' id='stipendio' name='stipendio' >
        </div>

        <div>
            <label for='ore'>Ore</label >
            <input type='text' id='ore' name='ore'>
        </div>

        <button>Modifica contratto</button>
       
    
    </form>

</body>";
echo "<legend> Attuale domanda";
echo "<fieldset>";

        $sql3 = "SELECT * FROM Domande
                  WHERE ID_Domanda = '$id_domanda'";
        $result3 = mysqli_query($connessione, $sql3);
        
        while ($row_d = mysqli_fetch_assoc($result3)){

          $id_offerta = $row_d['ID_Offerta'];
          $sql4 = "SELECT * FROM Offerte_di_lavoro
                   WHERE ID_Offerta = $id_offerta";
          $result4 = mysqli_query($connessione, $sql4);

            while($row=mysqli_fetch_assoc($result4)){
                echo '<div class="riquadro">
                <table>
                  <thead>
                    <tr>
                      <th>Ore</th>
                      <th>Periodo</th>
                      <th>Stipendio</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>';
                echo "<tr>";
                echo "<td>" . $row['Ore'] . "</td>";
                echo "<td>" . $row['Periodo'] . "</td>";
                echo "<td>" . $row['Stipendio'] . "</td>";
                echo "<td><form action='processo-contratto.php' method='POST' id='inserimento'>
                          <input type='hidden' name='confermato' value='confermato'>
                          <input type='hidden' name='id_domanda' value='".$id_domanda."'>
                          <input type='hidden' name='nome' value='".$nome."'>                
                          <input type='hidden' name='cognome' value='".$cognome."'>
                          <input type='hidden' name='matricola' value='".$matricola."'>
                          <input type='hidden' name='posizione' value='".$posizione."'>
                          <input type='hidden' name='id_offerta' value='".$id_offerta."'>
                          <button> Stipula contratto senza modifiche</button>
                      </td>";
                echo "</tr>";
            }
    echo "</fieldset>";
    echo "</legend>";
        }
      }

if (isset($rifiutato_e)){
    echo "<h2> Lo studente è stato rifiutato.</h2>";
    $sql = "UPDATE  Domande
            SET Stato = 'Rifiutato da esercente'
            WHERE ID_Domanda = '$id_domanda'";
    $result = mysqli_query($connessione, $sql);

    $sql1 = "UPDATE Domande
             SET Commento = '' 
             WHERE ID_Domanda = '$id_domanda';";
    $result1 = mysqli_query($connessione, $sql1);
}
?>