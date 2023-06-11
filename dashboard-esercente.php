<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Esercente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$esercente = $result->fetch_assoc();

		$nome_azienda = $esercente["Nome_azienda"];
    $id_esercente = $esercente["Account_ID"];
    $nome_esercente = $esercente["Nome"];

    $sql2 = "SELECT Nome_azienda FROM Offerte_di_lavoro
             WHERE Nome_azienda = '$nome_azienda'";
        
    $result2 = $connessione->query($sql2);
    $offerta_di_lavoro = $result2->fetch_assoc();

    if (isset($offerta_di_lavoro)){
        $nome_azienda_offerta = $offerta_di_lavoro["Nome_azienda"];     
    }

    $sql3 = "SELECT ID_Esercente FROM Domande
             WHERE ID_Esercente = $id_esercente;";
    $result3 = mysqli_query($connessione, $sql3);
    $array_id_esercente = mysqli_fetch_assoc($result3);
    if (isset($array_id_esercente)){
        $id_esercente_domanda = $array_id_esercente['ID_Esercente'];
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
  .button-container {
    width: 100px;
    
  }
  .button-container button {
    width: 120px;
    margin-right: 120px;
    margin-left: 5px;
  }
  .button-modifica {
    display: flex;
    
  }
  .button-modifica button {
    margin-right: 90px;
    margin-left: -15px;
  }
  .riquadro th{
    background-color: #080f29;
  }

</style>
<div>
    <h1> Benvenuto nella tua dashboard, <?= htmlspecialchars($nome_esercente)?>.</h1>
</div>
<h2>Le tue offerte</h2>

<?php if (isset($nome_azienda_offerta)): ?>

<fieldset>

<?php endif; ?>

<?php
    if (isset($nome_azienda_offerta)){                // Printa le domande solo se l'ID_Esercente è presente nelle domande
        $sql3 = "SELECT * FROM Offerte_di_lavoro
                 WHERE ID_Esercente = $id_esercente;";
        
        $result3 = mysqli_query($connessione, $sql3);
        while($row=mysqli_fetch_assoc($result3)){
            echo '<div class="riquadro">
            <table>
              <thead>
                <tr>
                  <th>Ore</th>
                  <th>Indirizzo</th>
                  <th>Periodo</th>
                  <th>Stipendio</th>
                  <th>Posti disponibili</th>
                  <th>Posizione</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>';
              
            echo "<tr>";
            echo "<td>" . $row['Ore'] . "</td>";
            echo "<td>" . $row['Indirizzo'] . "</td>";
            echo "<td>" . $row['Periodo'] . "</td>";
            echo "<td>" . $row['Stipendio'] . "</td>";
            echo "<td>" . $row['Posti_disponibili'] . "</td>";
            echo "<td>" . $row['Posizione'] . "</td>";
            echo "<td><form action='modifica-offerta.php' method='POST'>
            <div class='button-modifica'>
            <input type='hidden' name='id_offerta' value='".$row['ID_Offerta']."'>          
            <button type='submit'>Modifica</button> 
            </div>
            </form>
            </body></td>";
            echo "</tr>";
        }
	}
    else {
        echo "<h3>Non hai ancora inserito delle offerte di lavoro.</h3>";
    }
?>

</tbody>
</table>
</div>
<button onclick="location.href='inserisci-offerta.php'" type="button">Inserisci una nuova offerta</button>
</fieldset>
<h2> Le tue domande</h2>
<fieldset>
<legend></legend>
<?php
    if (isset($id_esercente_domanda)){
        $sql4 = "SELECT * FROM Domande
                  WHERE ID_Esercente = $id_esercente;";
        $result4 = mysqli_query($connessione, $sql4);           // Qui vengono printate le domande effettuate dagli studenti in base alle offferte di lavoro inserite
        
        while ($row_d = mysqli_fetch_assoc($result4)){
              $id_offerta = $row_d['ID_Offerta'];
              $sql5 = "SELECT * FROM Offerte_di_lavoro
                      WHERE ID_Offerta = $id_offerta";
              $result5 = mysqli_query($connessione, $sql5);

        
            while($row=mysqli_fetch_assoc($result5)){
                echo '<div class="riquadro">
                <table>
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Cognome</th>
                      <th>Posizione</th>
                      <th>Stato</th>
                      <th>Commento</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>';
                  $id_domanda = $row_d['ID_Domanda'];
                  $sql_matricola2 = "SELECT Matricola FROM Domande
                  WHERE ID_Domanda = $id_domanda;";
                  $result_matricola2 = mysqli_query($connessione, $sql_matricola2);
                  $array_matricola2 = mysqli_fetch_assoc($result_matricola2);
                  $matricola2 = $array_matricola2['Matricola'];

                  $sql_nomi = "SELECT Nome, Cognome FROM Studente
                              WHERE Matricola = $matricola2;";
                  $result_nomi = mysqli_query($connessione, $sql_nomi);
                  $array_nomi = mysqli_fetch_assoc($result_nomi);
                  $nome = $array_nomi['Nome'];
                  $cognome = $array_nomi['Cognome'];
                  echo "<tr>";
                  echo "<td>" . $nome . "</td>";
                  echo "<td>" . $cognome . "</td>";
                  echo "<td>" . $row['Posizione'] . "</td>";
                  echo "<td>" . $row_d['Stato'] . "</td>";
                  echo "<td>" . $row_d['Commento'] . "</td>";
                  
                  $sql = "SELECT Stato FROM Contratto
                          WHERE ID_Domanda = '$id_domanda'";
                  $result_stato = mysqli_query($connessione, $sql);
                  $array_stato = mysqli_fetch_assoc($result_stato);
                  $stato_c = '';
                  if (isset($array_stato)){               // Le domande possono essere accettate o rifiutate solo se è stata effettuata una valutazione dal referente
                  $stato_c = $array_stato['Stato'];
                  }
                  if ($row_d['Stato'] == 'Accettato dal referente' ){
                  echo "<td><form action='formazione-contratto.php' method='POST'>
                  <div class='button-container'>
                  <input type='hidden' name='id_domanda' value='".$row_d['ID_Domanda']."'>          
                  <button type='submit' name='accetta_e' value='accetta_e'>Accetta</button> 
                  <button type='submit' name='rifiuta_e' value='rifiuta_e'>Rifiuta</button>
                  </div>
                  </form>
                  </body></td>";
                  echo "</tr>";
                  }
                  elseif($stato_c == 'In attesa dello studente'){
                    echo "<td><button hidden='hidden' name='' value=''></button> 
                          <button hidden='hidden' name='' value=''></button></td>";

                }
            }
        }
	}
    else {
        echo "<h3>Non ci sono domande di lavoro per la tua azienda.</h3>";
    }
  
?>
</fieldset>
</body>
