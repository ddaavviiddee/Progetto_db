<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_azienda = $_POST['nome_azienda'];
    print($nome_azienda);
}
?>