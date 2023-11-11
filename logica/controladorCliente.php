<?php

require 'funciones.php';
require 'clientePersona.php';
require 'clienteEmpresa.php';
include '../persistencia/dao/clienteDAO.php';
include '../persistencia/dao/clientePersonaDAO.php';
include '../persistencia/dao/clienteEmpresaDAO.php';

//Tipos de datos que cliente-persona y cliente-empresa tienen en comun
//nroCliente Es un dato autoincrement en la bd
$email  = $_POST['email'];
$cont   = $_POST['contrasenia'];
$tel    = $_POST['telefono'];
$calle  = $_POST['calle'];
$nCalle = $_POST['numerocalle'];
$barr   = $_POST['barrio'];


if (($_POST['insert']) == 'cliente-persona') {
    //////////////////////////////insert para cliente persona/////////////////////////////////////
    //tipos de datos de cliente-persona
    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $nroDoc = $_POST['nrodocumento'];
    $tipoDoc = $_POST['tipodocumento'];

    $camposLlenos;
    //Verfica que cada campo no este vacio
    foreach ($_POST as $campos) {
        if (!empty(trim($campos))) {
            $camposLlenos = true;
        } else {
            $camposLlenos = false;
        }
    }

    //Guarda en variable datosValidos el resultado que da la invocacion de la funcion validaPersona (true o false)
    $datosValidos = validaPersona($email, $cont, $calle, $nCalle, $tel, $barr, $nom, $ape, $nroDoc, $tipoDoc);

    //VALIDACION
    //comprueba que todos los campos esten llenos y si los datos ingresados son validos
    if ($camposLlenos && $datosValidos) {
        //crea objeto Persona
        $persona = new Persona();
        //setea atributos al objeto
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

        //crea objeto clientePersonaDAO
        $insertPersona = new clientePersonaDAO();
        //Invoca a la funcion guardar, para realizar los inserts a la base de datos
        $insertPersona->guardar( $persona->getEmail(), $persona->getContrasenia(), $persona->getTelefono(),
            $persona->getCalle(), $persona->getNumCalle(), $persona->getBarrio(), $persona->getNombre(),
            $persona->getApellido(), $persona->getNroDocumento(), $persona->getTipoDocumento() );
    }else{
        //echo "N";
    }

} else if (($_POST['insert']) == 'cliente-empresa') {
    //////////////////////////////insert para cliente empresa/////////////////////////////////////
    //tipos de datos de cliente-empresa
    $rut = $_POST['rut'];
    $rSocial = $_POST['razon-social'];


    $camposLlenos;

    foreach ($_POST as $campos) {

        if (!empty(trim($campos))) {
            $camposLlenos = true;
        } else {
            $camposLlenos = false;
        }
    }


    $datosValidos = validaEmpresa($email, $cont, $calle, $nCalle, $tel, $barr, $rut, $rSocial);

    //comprueba que todos los campos esten llenos
    if ($camposLlenos && $datosValidos) {

        echo "SI";

        $empresa = new Empresa();

        $empresa->setEmail($email);
        $empresa->setContrasenia($cont);
        $empresa->setTelefono($tel);
        $empresa->setCalle($calle);
        $empresa->setNumCalle($nCalle);
        $empresa->setBarrio($barr);
        $empresa->setRut($rut);
        $empresa->setRazonSocial($rSocial);

        $insertEmpresa = new clienteEmpresaDAO();
        $insertEmpresa->guardar(
            $empresa->getEmail(), $empresa->getContrasenia(), $empresa->getTelefono(), $empresa->getCalle(),
            $empresa->getNumCalle(), $empresa->getBarrio(), $empresa->getRut(), $empresa->getRazonSocial()
        );

    } else {
        //echo "NO";
    }

} else if (($_POST['login']) == 'cliente') {
    echo "login";
    $usu = $_POST['usuario'];
    $con = $_POST['contrasenia'];
    $clienteLogin = new clienteDAO();
    $login = $clienteLogin->login($usu, $con);

    if ($login) {
        session_start();
        //session_destroy();
        $_SESSION['usuario'] = $usu;
        var_dump($_SESSION);
    }

}