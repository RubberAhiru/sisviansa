<?php

require 'vianda.php';



$id = 1;
$nom = "Papas Fritas";
$tiem = 37;
$prec = "Papas fritas ";
$cont = "Papas fritas con sal";
$img = "imagen.png";


$vianda = new Vianda();

$vianda->setId($id);
$vianda->setNombre($nom);
$vianda->setTiempo($tiem);
$vianda->setPrecio($prec);
$vianda->setContenido($cont);
$vianda->setImagen($img);

//$vianda->ver();
