<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>modifica-offerta</title>
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
</style>

<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $id_offerta = $_POST['id_offerta'];
  

}


echo "<form action='processo-modifica.php' method='post' id='inserimento'>
      <input type='hidden' name='id_offerta' value='".$id_offerta."'>
        <div>
            <label for='posizione'>Posizione</label>
            <input type='text' id='posizione' name='posizione' >
        </div>

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

        <div>
            <label for='posti_disponibili'>Posti disponibili</label >
            <input type='text' id='posti_disponibili' name='posti_disponibili'>
        </div>
    
        <button> Modifica offerta</button>
       
    
    </form>

</body>";
?>