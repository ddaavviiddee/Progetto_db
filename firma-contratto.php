<?php
session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){

    $connessione = require __DIR__ . "/db_conn.php";

    $sql = "SELECT * FROM Studente
            WHERE Account_ID = {$_SESSION["user_id"]}";

    $result = $connessione->query($sql);

    $user = $result->fetch_assoc();

    
}

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $id_contratto = $_POST['id_contratto'];
    $id_domanda = $_POST['id_domanda'];
    $ore = $_POST["ore"];
    $periodo = $_POST['periodo'];
    $stipendio = $_POST['stipendio'];
    $nome_azienda = $_POST['nome_azienda'];
    $posizione = $_POST["posizione"];

    $sql = "SELECT ID_Offerta FROM Domande
            WHERE ID_Domanda = $id_domanda";
    $result = mysqli_query($connessione, $sql);
    $array_offerta = mysqli_fetch_assoc($result);
    $id_offerta = $array_offerta['ID_Offerta'];
    
}


if (isset($_POST['accetta_s'])){

    $sql_u = "UPDATE Offerte_di_lavoro 
          SET Posti_disponibili = Posti_disponibili - 1 
          WHERE  ID_Offerta = $id_offerta;";
          
    $result_u = mysqli_query($connessione, $sql_u);

    $sql_s = "UPDATE Contratto SET Stato = 'Accettato dallo studente' 
              WHERE ID_Contratto = $id_contratto";
    $result_s = mysqli_query($connessione, $sql_s);


}

if (isset($_POST['rifiuta_s'])){
    echo "rifiutato";
}

header("Location: vedi-contratti.php");
exit;

?>






