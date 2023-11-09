<?php

include 'viandaDAO.php';

$viandaDAO = new ViandaDAO();
$contenido = $viandaDAO->listarTodas();

header('Content-type: application/json');
echo json_encode($contenido, JSON_PRETTY_PRINT);