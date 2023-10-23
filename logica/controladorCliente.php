<?php

require 'cliente-persona.php';
require 'cliente-empresa.php';


//Tipos de datos que cliente-persona y cliente-empresa tienen en comun
//nroCliente Es un dato autoincrement en la bd

$email = $_POST['email'];
$cont  = $_POST['contrasenia'];
$tel   = $_POST['telefono'];
$calle = $_POST['calle'];
$numC  = $_POST['numerocalle'];
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
        !empty(trim($numC))  && !empty(trim($barr))  && !empty(trim($nom)) && !empty(trim($ape)) &&
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
            
        }else{
            //error
        
        }
    }

    //si la validacion fue exitosa la variable $valido sera true y se procedera a crear el objeto
    if($valido){

        $persona = new Persona();
        
        $persona->setEmail($_POST['email']);
        $persona->setContrasenia($_POST['contrasenia']);
        $persona->setTelefono($_POST['telefono']);
        $persona->setCalle($_POST['calle']);
        $persona->setNumCalle($_POST['numerocalle']);
        $persona->setBarrio($_POST['barrio']);
        $persona->setNombre($_POST['nombre']);
        $persona->setApellido($_POST['apellido']);
        $persona->setNroDocumento($_POST['nrodocumento']);
        $persona->setTipoDocumento($_POST['tipodocumento']);

        $persona->guardar();

    }
    
}/*else if(($_POST['insert']) == 'cliente-empresa'){

}*/
