<?php

    include("../persistencia/conexion.php");
    $conex = conectar();

    if( ($_GET['insert']) == 'cliente-persona' ){
    
        ////Insert para registrar nuevo cliente-persona////

        if( //!empty(trim($_POST['nrocliente'])) &&
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
            //$nroC  = $_POST['nrocliente']; Es autoincrement en la bd
            $email = $_POST['email'];
            $cont  = $_POST['contrasenia'];
            $tel   = $_POST['telefono'];
            $calle = $_POST['calle'];
            $numC   = $_POST['numerocalle'];
            $barr  = $_POST['barrio'];
            $nom   = $_POST['nombre'];
            $ape   = $_POST['apellido'];
            $nroDoc  = $_POST['nrodocumento'];
            $tipoDoc = $_POST['tipodocumento'];
            $validos;
            
            //VALIDACION
            //correo electronico        
            if(is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $validos++;
            }
            //contrasenia
            if(is_string($cont) && strlen($cont)>6){
                $validos++;
            }
            //calle
            if(is_string($calle) && preg_match("/[a-zA-Z ]+/", $calle)){
                $validos++;
            }
            //numero de calle
            if(is_numeric($numC) && filter_var($numC, FILTER_VALIDATE_INT)){
                $validos++;
            }
            //numero de telefono
            if(is_numeric($tel) && filter_var($tel, FILTER_VALIDATE_INT)){
                $validos++;
            }
            //barrio
            if(is_string($barr)  && preg_match("/[a-zA-Z ]+/", $barr)){
                $validos++;
            }
            //nombre
            if(is_string($nom)   && preg_match("/[a-zA-Z ]+/", $nom)){
                $validos++;
            }
            //apellido
            if(is_string($ape)   && preg_match("/[a-zA-Z ]+/", $ape)){
                $validos++;
            }
            //numero de documento
            if(is_numeric($nroDoc)  && filter_var($nroDoc, FILTER_VALIDATE_INT)){
                $validos++;
            }
            //tipo de documento
            if(is_string($tipoDoc)  && preg_match("/[a-zA-Z ]+/", $tipoDoc)){
                $validos++;
            }
            
            //Si la validacion de los 10 datos es exitosa se procede a insertar en la base de datos
            if($validos == 10){
                /*echo "Es válido";
                $query = "INSERT INTO persona VALUES ()";
                $res = mysqli_query($conex, $query);
                echo $res ? "<h3>¡Registro realizado!</h3>" : 
                "<h3>¡Error!. Ha habido un error con la base de datos al tratar de insertar los datos</h3>";*/
            }
        }

    }


?>
