<?php

include '../logica/vianda.php';

$vianda = new Vianda();
$contenido = $vianda->listarTodas();

header('Content-type: application/json');
echo json_encode($contenido, JSON_PRETTY_PRINT);