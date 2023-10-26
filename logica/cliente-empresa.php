<?php

include_once('cliente.php');


class Empresa extends Cliente {
    //Propiedades
    private $rut;
    private $razonSocial;

    //Constructor
    public function __construct(){
        parent::__construct();
    }

    //Setters Cliente-Empresa
    public function setRut($rut) {
        $this->rut = $rut;
    }
    public function setRazonSocial($razonSocial) {
        $this->razonSocial = $razonSocial;
    }
    //Getters Cliente-Empresa
    public function getRut() {
        return $this->rut;
    }
    public function getRazonSocial() {
        return $this->razonSocial;
    }

    public function guardar(){
    //Inserta datos a la tabla cliente
    //con Prepared Statement (Declaracion Preparada)

        //Prepara una declaracion de INSERT
        $stmt = $this->conex ->prepare("INSERT INTO cliente (email, contrasenia, dir_calle, dir_num, dir_barrio)
            VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $this->getEmail(),$this->getContrasenia(), $this->getCalle(), 
            $this->getNumCalle(), $this->getBarrio());
        //Ejecuta declaracion para insertar
        $stmt->execute();

        //Obtiene el nroCliente asignado
        //prepara una declaracion de consulta SELECT
        $stmt = $this->conex ->prepare("SELECT nroCliente FROM cliente WHERE email = ?");
        $stmt->bind_param("s", $this->getEmail());
        //Ejecuta declaracion para hacer consulta
        $stmt->execute();
        $result = $stmt->get_result();
        $nCliente = $result->fetch_assoc();
        //Guarda el numero de cliente en variable numC
        $numC = ($nCliente['nroCliente']);
        //var_dump($numC);

        //Inserta en tabla cliente-telefono
        $stmt = $this->conex ->prepare("INSERT INTO telefono (nroCliente, num_cliente) VALUES (?, ?)");
        $stmt->bind_param("is", $numC, $this->getTel());
        $stmt->execute();

        //Inserta en tabla cliente-empresa 
        $stmt = $this->conex ->prepare("INSERT INTO empresa (nroCliente, rut, razon_social) 
            VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $numC, $this->getRut(), $this->getRazonSocial());
        $stmt->execute();
        
        //Cerrar instancia
        $stmt->close();
        //Cerrar conexion
        $this->conex ->close();
    }

}