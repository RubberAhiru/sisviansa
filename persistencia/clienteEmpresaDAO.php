<?php

include_once('cliente.php');

class clienteEmpresaDAO
{
    private $conex;
    public function __construct()
    {
        $this->conex = BaseDeDatos::conectar();

    }

    public function guardar($email, $cont, $tel, $calle, $numCalle, $barr, $rut, $rSoc){
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

        //Inserta en tabla cliente-empresa 
        $stmt = $this->conex->prepare("INSERT INTO empresa (nroCliente, rut, razon_social) 
            VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $numCli, $rut, $rSoc);
        $stmt->execute();

        //Cerrar instancia
        $stmt->close();
        //Cerrar conexion
        $this->conex->close();
    }

}