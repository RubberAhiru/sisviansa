<?php

    include("../persistencia/conexion.php");
    $conex = conectar();

    //INSERT////////////////////////////////

    ////Insert para registrar nuevo usuario////

    if( !empty(trim($_POST['nombre'])) &&
        !empty(trim($_POST['apellido'])) &&
        !empty(trim($_POST['calle'])) &&
        !empty(trim($_POST['nro'])) &&
        !empty(trim($_POST['barrio'])) &&
        !empty(trim($_POST['email'])) &&
        !empty(trim($_POST['contrasenia']))
        )
    {   
        //$nrocliente = null;
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $calle = $_POST['calle'];
        $num = $_POST['nro'];
        $barr = $_POST['barrio'];
        $email = $_POST['email'];
        //$cont = $_POST['contrasenia'];
        $valido = false;
        
        //Validación
        switch($_POST){
            case ( is_string($nom)   && preg_match("/[a-zA-Z ]+/", $nom) ):
            case ( is_string($ape)   && preg_match("/[a-zA-Z ]+/", $ape) ):
            case ( is_string($calle) && preg_match("/[a-zA-Z ]+/", $calle) ):
            case ( is_numeric($num)  && filter_var($num, FILTER_VALIDATE_INT) ):
            case ( is_string($barr)  && preg_match("/[a-zA-Z ]+/", $barr) ):
            case ( is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ):      
                $valido = true;
                break;
            default: 
                $valido = false;   
        }

        /*if($valido){
            $query = "INSERT INTO VALUES ()";
            $res = mysqli_query($conex, $query);
    
            echo $res ? "<h3>¡Registro realizado!</h3>" : 
            "<h3>¡Error!. Ha habido un error con la base de datos al tratar de insertar los datos</h3>";
        }*/
    }

?>
