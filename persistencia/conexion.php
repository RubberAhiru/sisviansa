<?php

function conectar()
{
    $host = "192.168.2.209/phpmyadmin"; //"localhost";
    $usr = "rubberahiru"; //"neodev"; //"root";
    $pwd = "patitodehule"; //"p455w0rd"; //"";
    $bd = "rubber_ahiru";

    $con = mysqli_connect($host, $usr, $pwd, $bd) 
        or die("<h3>No hay conexión con la base de datos </h3><br>".mysqli_connect_error());

    return $con;
}

?>