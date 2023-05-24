<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $stipendio = $_GET['stipendio'];
    $periodo = $_GET['periodo'];
    $azienda = $_GET['azienda'];
    $posizione = $_GET['posizione'];
    print_r($stipendio);
}

?>