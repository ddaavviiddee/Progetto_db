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
    <title>Offerta</title>
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
<h1>Ecco l'offerta</h1>
<fieldset>
<div class="riquadro">
  <table>
    <thead>
      <tr>
        <th>Azienda</th>
        <th>Ore</th>
		    <th>Indirizzo</th>
        <th>Periodo</th>
		    <th>Stipendio</th>
        <th>Posti disponibili</th>
		    <th>Posizione</th>
        <th>Email aziendale</th>
      </tr>
    </thead>
    <tbody>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_offerta = $_POST['id_offerta'];
}

$query = "SELECT * FROM Offerte_di_lavoro
          WHERE ID_Offerta = '$id_offerta'";
$result2 = mysqli_query($connessione, $query);
	while($row=mysqli_fetch_assoc($result2)){
        $nome_azienda = $row['Nome_azienda'];
        $ore = $row['Ore'];
        $indirizzo = $row['Indirizzo'];
        $periodo = $row['Periodo'];
        $stipendio=$row['Stipendio'];
        $posti_disponibili = $row['Posti_disponibili'];
        $posizione = $row['Posizione'];
        $id_esercente = $row['ID_Esercente'];
 

        $sql_e = "SELECT Email_aziendale FROM Esercente
                  WHERE Nome_azienda = '$nome_azienda'";
        $result_e = $connessione->query($sql_e);
        $array = $result_e->fetch_assoc();
        $email_aziendale = $array['Email_aziendale'];

		    echo "<tr>";
		    echo "<td>" . $row['Nome_azienda'] . "</td>";
        echo "<td>" . $row['Ore'] . "</td>";
		    echo "<td>" . $row['Indirizzo'] . "</td>";
        echo "<td>" . $row['Periodo'] . "</td>";
		    echo "<td>" . $row['Stipendio'] . "</td>";
        echo "<td>" . $row['Posti_disponibili'] . "</td>";
		    echo "<td>" . $row['Posizione'] . "</td>";
        echo "<td>" . $email_aziendale . "</td>";
        echo "</tr>";
	}
?> 

</tbody>
</table>
</div>
</fieldset>

<?php
    $sql_d = "SELECT Matricola FROM Domande
    WHERE Matricola = '$matricola' AND ID_Offerta = $id_offerta";
    $result_d = $connessione->query($sql_d);
    $domanda = $result_d->fetch_assoc();

    if (isset($domanda['Matricola'])){
    $matricola_d = $domanda['Matricola'];
    }
    

    if (isset($matricola_d) && $matricola == $matricola_d){
        echo "<h3>Hai già fatto domanda per questa offerta.<h3>";
    } else {
        echo"<form action='aggiungi-domanda.php' method='POST'>       
        <input type='hidden' name='nome_azienda' value='".$nome_azienda."'>
        <input type='hidden' name='ore' value='".$ore."'>
        <input type='hidden' name='indirizzo' value='".$indirizzo."'>
        <input type='hidden' name='periodo' value='".$periodo."'>
        <input type='hidden' name='stipendio' value='".$stipendio."'>
        <input type='hidden' name='posti_disponibili' value='".$posti_disponibili."'>
        <input type='hidden' name='posizione' value='".$posizione."'>
        <input type='hidden' name='matricola' value='".$matricola."'>
        <input type='hidden' name='id_offerta' value='".$id_offerta."'>
        <input type='hidden' name='id_esercente' value='".$id_esercente."'>      
        <button type='submit'>Applica</button>
        </form>";
    }
  ?>
</body>

