<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="javascript/validazione_aggiuntiva.js" defer></script>
    <title>Offerte filtrate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $connessione = require __DIR__ . "/db_conn.php";

    $stipendio = $_POST['stipendio'];
    $periodo = $_POST['periodo'];
    $azienda = $_POST['azienda'];
    $azienda = ucwords($azienda);
    $posizione = $_POST['posizione'];
    $posizione = ucwords(($posizione));
    
}
?>

</head>
<body>
<h1>Offerte</h1>
<fieldset>
<legend>Ecco tutte le offerte disponibili in base ai tuoi filtri</legend>

<?php

    $query = "SELECT * FROM Offerte_di_lavoro WHERE 1 = 1";

    if (!empty($periodo)){
        $query .= " AND Periodo = '$periodo'";
    }

    if (!empty($azienda)){
        $query .= " AND Nome_azienda = '$azienda'";
    }
    if (!empty($posizione)){
        $query .= " AND Posizione = '$posizione'";
    }

    if ($stipendio == "crescente"){
        $query .= " ORDER BY Stipendio ASC";
    }
    if ($stipendio == "decrescente"){
        $query .= " ORDER BY Stipendio DESC";
    }

   

	$result2 = mysqli_query($connessione, $query);
    $trovati = false; // Variabile di controllo

    while ($row = mysqli_fetch_assoc($result2)) {
        if ($row['Posti_disponibili'] > 0) {
            $trovati = true;
            if ($trovati){
                echo '<div class="riquadro">
                <table>
                  <thead>
                    <tr>
                      <th>Azienda</th>
                      <th>Stipendio</th>
                      <th>Periodo</th>
                      <th>Posti disponibili</th>
                      <th>Posizione</th>
                    </tr>  
                  </thead>
                  <tbody>';
            }                                  // Imposta la variabile di controllo su true
            echo "<tr>";
            echo "<td>" . $row['Nome_azienda'] . "</td>";
            echo "<td>" . $row['Stipendio'] .  " € </td>";
            echo "<td>" . $row['Periodo'] . "</td>";
            echo "<td>" . $row['Posti_disponibili'] . "</td>";
            echo "<td>" . $row['Posizione'] . "</td>";
            echo "<td>
                <form action='vedi-offerta.php' method='POST'>          
                    <input type='hidden' name='id_offerta' value='".$row['ID_Offerta']."'>
                    <button type='submit'>Info</button>
                </form>
            </td>"; 
            echo "</tr>";
        }
    }

    if (!$trovati) {
    echo "<h2>Non ci sono offerte disponibili con i tuoi filtri.</h2>";
    }

?>                    

</tbody>
</table>
</div>
</fieldset>
<form action='vedi-domande.php' >
<button>Vedi le tue domande</button>
</form>
<form action='dashboard-studente.php' >
<button>Torna alla tua dashboard</button>
</form>
</body>

