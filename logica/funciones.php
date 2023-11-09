<?php

/*function cerrarSesion () {
    session_destroy();
}*/

function validaPersona($email, $cont, $calle, $nCalle, $tel, $barr, $nom, $ape, $nroDoc, $tipoDoc){
//Comprueba si los datos ingresados son validos    
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
        $valido = false;  
    }

    return $valido;
}

function validaEmpresa($email, $cont, $calle, $nCalle, $tel, $barr, $rut, $rSocial){
//Comprueba si los datos ingresados son validos  
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
        //rut
        ( is_numeric($rut)  && preg_match("/[0-9]/", $rut) ) &&
        //razon social
        ( is_string($rSocial)  && preg_match("/[a-zA-Z ]+/", $rSocial) )
    ){
        $valido = true;
    }else{
        //error
        $valido = false;
    }

    return $valido;
}