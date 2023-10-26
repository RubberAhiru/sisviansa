<?php

require 'cliente-persona.php';
require 'cliente-empresa.php';

//Tipos de datos que cliente-persona y cliente-empresa tienen en comun
//nroCliente Es un dato autoincrement en la bd
$email = $_POST['email'];
$cont  = $_POST['contrasenia'];
$tel   = $_POST['telefono'];
$calle = $_POST['calle'];
$nCalle  = $_POST['numerocalle'];
$barr  = $_POST['barrio'];

$valido = false;


if( ($_POST['insert']) == 'cliente-persona' ){
    //////////////////////////////insert para cliente persona/////////////////////////////////////
    //tipos de datos de cliente-persona
    $nom   = $_POST['nombre'];
    $ape   = $_POST['apellido'];
    $nroDoc  = $_POST['nrodocumento'];
    $tipoDoc = $_POST['tipodocumento'];


    //comprueba que todos los campos esten llenos
    if( 
        !empty(trim($email)) && !empty(trim($cont))  && !empty(trim($tel))   && !empty(trim($calle)) &&
        !empty(trim($nCalle))  && !empty(trim($barr))  && !empty(trim($nom)) && !empty(trim($ape)) &&
        !empty(trim($nroDoc)) && !empty(trim($tipoDoc))
    ){
        //VALIDACION
            //comprueba que cada campo contenga los caracteres correspondientes
        if( //correo electronico 
            ( is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) &&
            //contrasenia
            ( is_string($cont)  && strlen($cont)>6 ) &&
            //calle
            ( is_string($calle) && preg_match("/[a-zA-Z ]+/", $calle) ) &&
            //numero de calle
            ( is_numeric($nCalle) && filter_var($nCalle, FILTER_VALIDATE_INT) ) &&
            //numero de telefono
            ( is_numeric($tel)  && preg_match("/[0-9]/", $tel) ) &&
            //barrio
            ( is_string($barr)  && preg_match("/[a-zA-Z ]+/", $barr) ) &&
            //nombre
            ( is_string($nom)   && preg_match("/[a-zA-Z ]+/", $nom) ) &&
            //apellido
            ( is_string($ape)   && preg_match("/[a-zA-Z ]+/", $ape) ) &&
            //numero de documento
            ( is_numeric($nroDoc)  && preg_match("/[0-9]/", $nroDoc) ) &&
            //tipo de documento
            ( is_string($tipoDoc)  && preg_match("/[a-zA-Z ]+/", $tipoDoc) )
        ){
            $valido = true;
        }else{
            //error  
        }
    }

    //si la validacion fue exitosa la variable $valido sera true y se procedera a crear el objeto
    if($valido){
        $persona = new Persona();

        $persona->setEmail($email);
        $persona->setContrasenia($cont);
        $persona->setTelefono($tel);
        $persona->setCalle($calle);
        $persona->setNumCalle($nCalle);
        $persona->setBarrio($barr);
        $persona->setNombre($nom);
        $persona->setApellido($ape);
        $persona->setNroDocumento($nroDoc);
        $persona->setTipoDocumento($tipoDoc);

        //Invoca a la funcion guardar, para realizar los inserts a la base de datos
        $persona->guardar();
    }
    
}else if( ($_POST['insert']) == 'cliente-empresa' ){
    //////////////////////////////insert para cliente empresa/////////////////////////////////////
    //tipos de datos de cliente-empresa
    $rut = $_POST['rut'];
    $rSocial = $_POST['razon-social'];

    //comprueba que todos los campos esten llenos
    if( 
        !empty(trim($email)) && !empty(trim($cont))  && !empty(trim($tel))   && !empty(trim($calle)) &&
        !empty(trim($nCalle))  && !empty(trim($barr))  && !empty(trim($rut)) && !empty(trim($rSocial))
    ){      
        //VALIDACION
            //comprueba que cada campo contenga los caracteres correspondientes
        if( 
            //correo electronico 
            ( is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) &&
            //contrasenia
            ( is_string($cont)  && strlen($cont)>6 ) &&
            //calle
            ( is_string($calle) && preg_match("/[a-zA-Z ]+/", $calle) ) &&
            //numero de calle
            ( is_numeric($nCalle) && filter_var($nCalle, FILTER_VALIDATE_INT) ) &&
            //numero de telefono
            ( is_numeric($tel)  && preg_match("/[0-9]/", $tel) ) &&
            //barrio
            ( is_string($barr)  && preg_match("/[a-zA-Z ]+/", $barr) ) &&
            //rut
            ( is_numeric($rut)  && preg_match("/[0-9]/", $rut) ) &&
            //razon social
            ( is_string($rSocial)  && preg_match("/[a-zA-Z ]+/", $rSocial) )
        ){
            $valido = true;
        }else{
            //error
        }
    }

    //si la validacion fue exitosa la variable $valido sera true y se procedera a crear el objeto
    if($valido){
        $empresa = new Empresa();

        $empresa->setEmail($email);
        $empresa->setContrasenia($cont);
        $empresa->setTelefono($tel);
        $empresa->setCalle($calle);
        $empresa->setNumCalle($nCalle);
        $empresa->setBarrio($barr);
        $empresa->setRut($rut);
        $empresa->setRazonSocial($rSocial);

        //Invoca a la funcion guardar, para realizar los inserts a la base de datos
        $empresa->guardar();
    }
}
