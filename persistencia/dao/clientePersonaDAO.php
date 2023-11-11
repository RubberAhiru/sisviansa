<?php

include_once('../persistencia/conexion.php');

class clientePersonaDAO
{
    private $conex;
    public function __construct()
    {
        $this->conex = BaseDeDatos::conectar();

    }

    public function guardar($email, $cont, $tel, $calle, $numCalle, $barr, $nom, $ape, $nDoc, $tDoc){
    //Inserta datos a la tabla cliente
    //con Prepared Statement (Declaracion Preparada) 

        //Prepara una declaracion de INSERT
        //stmt: statement(declaracion)
        $stmt = $this->conex->prepare("INSERT INTO cliente (email, contrasenia, dir_calle, dir_num, dir_barrio)
                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $email, $cont, $calle, $numCalle, $barr);
        //Ejecuta declaracion para insertar
        $stmt->execute();

        //Obtiene el nroCliente asignado
        //prepara una declaracion de consulta SELECT
        $stmt = $this->conex->prepare("SELECT nroCliente FROM cliente WHERE email = ?");
        $stmt->bind_param("s", $email);
        //Ejecuta declaracion para hacer consulta
        $stmt->execute();
        $result = $stmt->get_result();
        $nCliente = $result->fetch_assoc();
        //Guarda el numero de cliente en variable numCli
        $numCli = ($nCliente['nroCliente']);

        //Inserta en tabla cliente-telefono
        $stmt = $this->conex->prepare("INSERT INTO telefono (nroCliente, num_cliente) VALUES (?, ?)");
        $stmt->bind_param("is", $numCli, $tel);
        $stmt->execute();

        //Inserta en tabla cliente-persona 
        $stmt = $this->conex->prepare("INSERT INTO persona (nroCliente, nombre, apellido, doc_tipo, doc_num) 
                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $numCli, $nom, $ape, $tDoc, $nDoc);
        $stmt->execute();

        //Cerrar instancia
        $stmt->close();
        //Cerrar conexion
        $this->conex->close();

    }

}