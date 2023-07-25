<?php

function conectar()
{
    $host = "192.168.2.209/phpmyadmin";
    $usr = "rubberahiru";
    $pwd = ""; //introducir contraseña!!
    $bd = "rubber_ahiru";

    $con = mysqli_connect($host, $usr, $pwd, $bd) 
        or die("<h3>No hay conexión con la base de datos </h3><br>".mysqli_connect_error());

    return $con;
}

?>