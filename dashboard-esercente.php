<?php
    session_start();  // Inizializzazione della sessione
	if (isset($_SESSION["user_id"])){

		$connessione = require __DIR__ . "/db_conn.php";

		$sql = "SELECT * FROM Esercente
				WHERE Account_ID = {$_SESSION["user_id"]}";

		$result = $connessione->query($sql);

		$esercente = $result->fetch_assoc();

		$nome_azienda = $esercente["Nome_azienda"];

        $sql2 = "SELECT Nome_azienda FROM Offerte_di_lavoro
                 WHERE Nome_azienda = '$nome_azienda'";
        
        $result2 = $connessione->query($sql2);
        $offerta_di_lavoro = $result2->fetch_assoc();

        if (isset($offerta_di_lavoro)){
            $nome_azienda_offerta = $offerta_di_lavoro["Nome_azienda"];
        }

        $sql_check = "SELECT Nome_azienda FROM Domande 
                 WHERE Nome_azienda = '$nome_azienda'"; // Controlla che ci siano domande
        
        $result_check = $connessione->query($sql_check);
        $domanda = $result_check->fetch_assoc();

        if (isset($domanda)){
            $nome_azienda_domanda = $domanda["Nome_azienda"];
        }

        $sql_matricola = "SELECT Matricola FROM Domande
                          WHERE Nome_azienda = '$nome_azienda'";

        $result_matricola = $connessione->query($sql_matricola);
        $array_matricola = $result_matricola->fetch_assoc();
        $matricola = $array_matricola['Matricola'];

        $sql_studente = "SELECT Nome, Cognome, Luogo FROM Studente
                         WHERE Matricola = '$matricola'";

        $result_studente = $connessione->query($sql_studente);
        $array_studente = $result_studente->fetch_assoc();
        $nome_studente = $array_studente['Nome'];
        $cognome_studente = $array_studente['Cognome'];
        $luogo_studente = $array_studente['Luogo'];

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
    margin-left: 25px;
  }
  .button-modifica {
    display: flex;
    
  }
  .button-modifica button {
    margin-right: 90px;
    margin-left: -20px;
  }
</style>
<h1>La tua dashboard</h1>
<h2>Le tue offerte</h2>
<?php if (isset($nome_azienda_offerta)): ?>
<fieldset>

<?php endif; ?>

<?php
    if (isset($nome_azienda_offerta)){ // Printa le domande solo se l'azienda è presente nella tebella domande
        $sql3 = "SELECT * FROM Offerte_di_lavoro
                  WHERE Nome_azienda = '$nome_azienda'";
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
    if (isset($nome_azienda_domanda)){
        $sql4 = "SELECT * FROM Domande
                  WHERE '$nome_azienda' = Nome_azienda";
        $result4 = mysqli_query($connessione, $sql4);
        while($row=mysqli_fetch_assoc($result4)){
            echo '<div class="riquadro">
            <table>
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Cognome</th>
                  <th>Posizione</th>
                  <th>Stato</th>
                </tr>
              </thead>
              <tbody>';
            echo "<tr>";
            echo "<td>" . $nome_studente . "</td>";
            echo "<td>" . $cognome_studente . "</td>";
            echo "<td>" . $row['Posizione'] . "</td>";
            echo "<td>" . $row['Stato'] . "</td>";
            if ($row['Stato'] == 'Accettato dal referente'){
            echo "<td><form action='valuta-studente.php' method='POST'>
            <div class='button-container'>
            <input type='hidden' name='matricola' value='".$row['Matricola']."'>
            <input type='hidden' name='posizione' value='".$row['Posizione']."'>          
            <button type='submit' name='accetta_e' value='accetta_e'>Accetta</button> 
            <button type='submit' name='rifiuta_e' value='rifiuta_e'>Rifiuta</button>
            </div>
            </form>
            </body></td>";
            echo "</tr>";
            }
            else{
              echo "<td><button hidden='hidden' name='' value=''></button> 
                    <button hidden='hidden' name='' value=''></button></td>";

            }
        }
	}
    else {
        echo "<h3>Non ci sono domande di lavoro per la tua azienda.</h3>";
    }
  
?>
</fieldset>
</body>
