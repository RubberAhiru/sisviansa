<?php

session_start();

$sesion = $_SESSION['usuario'];

header('Content-type: application/json');
echo json_encode($sesion, JSON_PRETTY_PRINT);