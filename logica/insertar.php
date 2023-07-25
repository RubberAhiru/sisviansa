<?php

    include("../persistencia/conexion.php");
    $conex = conectar();

    //INSERT////////////////////////////////

    //Insert para registrar nuevo usuario

    if( !empty(trim($_POST['nombre'])) &&
        !empty(trim($_POST['apellido'])) &&
        !empty(trim($_POST['calle'])) &&
        !empty(trim($_POST['nro'])) &&
        !empty(trim($_POST['barrio'])) &&
        !empty(trim($_POST['email'])) &&
        !empty(trim($_POST['contrasenia']))
    )
    {
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $calle = $_POST['calle'];
        $num = $_POST['nro'];
        $barr = $_POST['barrio'];
        $email = $_POST['email'];
        $cont = $_POST['contrasenia'];  
    }

?>
