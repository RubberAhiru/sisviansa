<?php
require_once 'cliente.php';

if( ($_GET['insert']) == 'cliente-persona' ){
    //insert para cliente persona

        //comprueba que todos los campos esten llenos
    if( //$_POST['nrocliente']; Es autoincrement en la bd
        !empty(trim($_POST['email'])) &&
        !empty(trim($_POST['contrasenia'])) &&
        !empty(trim($_POST['telefono'])) &&
        !empty(trim($_POST['calle'])) &&
        !empty(trim($_POST['numerocalle'])) &&
        !empty(trim($_POST['barrio'])) &&

        !empty(trim($_POST['nombre'])) &&
        !empty(trim($_POST['apellido'])) &&
        !empty(trim($_POST['nrodocumento'])) &&
        !empty(trim($_POST['tipodocumento']))
    ){
        echo "1";
        $email = $_POST['email'];
        $cont  = $_POST['contrasenia'];
        $tel   = $_POST['telefono'];
        $calle = $_POST['calle'];
        $numC  = $_POST['numerocalle'];
        $barr  = $_POST['barrio'];
        $nom   = $_POST['nombre'];
        $ape   = $_POST['apellido'];
        $nroDoc  = $_POST['nrodocumento'];
        $tipoDoc = $_POST['tipodocumento'];
        $valido = false;

        //VALIDACION
    
        if( //correo electronico 
            ( is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) &&
            //contrasenia
            ( is_string($cont)  && strlen($cont)>6 ) &&
            //calle
            ( is_string($calle) && preg_match("/[a-zA-Z ]+/", $calle) ) &&
            //numero de calle
            ( is_numeric($numC) && filter_var($numC, FILTER_VALIDATE_INT) ) &&
            //numero de telefono
            ( is_numeric($tel)  && preg_match("/[0-9]/", $tel) ) &&
            //barrio
            ( is_string($barr)  && preg_match("/[a-zA-Z ]+/", $barr) ) &&
            //nombre
            ( is_string($nom)   && preg_match("/[a-zA-Z ]+/", $nom) ) &&
            //apellido
            ( is_string($ape)   && preg_match("/[a-zA-Z ]+/", $ape) ) &&
            //numero de documento
            ( is_numeric($nroDoc)  && filter_var($nroDoc, FILTER_VALIDATE_INT) ) &&
            //tipo de documento
            ( is_string($tipoDoc)  && preg_match("/[a-zA-Z ]+/", $tipoDoc) )
        ){
            $valido = true;

        }
    }

    
}
