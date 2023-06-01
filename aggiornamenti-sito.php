<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $connessione = require __DIR__ . "/db_conn.php";

    if (isset($_POST['rimosso'])){
        $id = $_POST['id'];
        $sql = "UPDATE Account 
                SET Flag = 1
                WHERE ID = $id;";
        $result = mysqli_query($connessione,$sql);

        $data = date("Y-m-d H:i:s");
        $modifica = 'Sospeso account con ID = '.$id;
        $sql2 = "INSERT INTO Aggiornamenti_sito (Modifica, Operatore_modifica, Data_modifica)
                 VALUES ('$modifica', 'Amministratore', '$data');";
        $resul2 = mysqli_query($connessione, $sql2);

        header("Location: dashboard-amministratore.php");
        exit;    
   }

    if (isset($_POST['ripristinato'])){
        $ripristinato = $_POST['ripristinato'];
        $id = $_POST['id'];
        $sql = "UPDATE Account 
                SET Flag = 0
                WHERE ID = $id;";
        $result = mysqli_query($connessione,$sql);

        $data = date("Y-m-d H:i:s");
        $modifica = 'Ripristinato account con ID = '.$id;
        $sql2 = "INSERT INTO Aggiornamenti_sito (Modifica, Operatore_modifica, Data_modifica)
                 VALUES ('$modifica', 'Amministratore', '$data');";
        $resul2 = mysqli_query($connessione, $sql2);

        header("Location: dashboard-amministratore.php");
        exit;
    }

    if (isset($_POST['rimosso_d'])){
      $id_domanda = $_POST['id_domanda'];
      $sql = "DELETE FROM Domande 
              WHERE ID_Domanda = $id_domanda;";
      $result = mysqli_query($connessione,$sql);

      $data = date("Y-m-d H:i:s");
      $modifica = 'Eliminata domanda con ID = '.$id_domanda;
      $sql2 = "INSERT INTO Aggiornamenti_sito (Modifica, Operatore_modifica, Data_modifica)
               VALUES ('$modifica', 'Moderatore', '$data');";
      $result2 = mysqli_query($connessione, $sql2);
      
      header("Location: dashboard-moderatore.php");
      exit;
      
    }

    if (isset($_POST['rimosso_c'])){
        $id_contratto = $_POST['id_contratto'];
        $sql = "DELETE FROM Contratto 
                WHERE ID_Contratto = $id_contratto;";
        $result = mysqli_query($connessione,$sql);
  
        $data = date("Y-m-d H:i:s");
        $modifica = 'Eliminato contratto con ID = '.$id_contratto;
        $sql2 = "INSERT INTO Aggiornamenti_sito (Modifica, Operatore_modifica, Data_modifica)
                 VALUES ('$modifica', 'Moderatore', '$data');";
        $result2 = mysqli_query($connessione, $sql2);
        
        header("Location: dashboard-moderatore.php");
        exit;
        
      }

}
?>

