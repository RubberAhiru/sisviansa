<?php

include("../persistencia/conexion.php");


class Cliente
{
    //Propiedades
    protected $nroCliente;
    protected $email;
    protected $contrasenia;
    protected $telefono;
    protected $calle;
    protected $numCalle;
    protected $barrio;
    protected $conex;

    //Constructor
    protected function __construct()
    {
        $this->conex = BaseDeDatos::conectar();
    }

    //Setters
    public function setNroCliente($nro)
    {
        $this->nroCliente = $nro;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setContrasenia($cont)
    {
        $this->contrasenia = $cont;
    }
    public function setTelefono($tel)
    {
        $this->telefono = $tel;
    }
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }
    public function setNumCalle($numeroc)
    {
        $this->numCalle = $numeroc;
    }
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;
    }

    //Getters
    public function getNroCliente()
    {
        return $this->nroCliente;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getContrasenia()
    {
        return $this->contrasenia;
    }
    public function getTel()
    {
        return $this->telefono;
    }
    public function getCalle()
    {
        return $this->calle;
    }
    public function getNumCalle()
    {
        return $this->numCalle;
    }
    public function getBarrio()
    {
        return $this->barrio;
    }

}

class Persona extends Cliente
{
    //Propiedades
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $tipoDocumento;

    //Constructor
    public function __construct()
    {
        parent::__construct();

    }


    //Setters Cliente-Persona
    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }
    public function setApellido($ape)
    {
        $this->apellido = $ape;
    }
    public function setNroDocumento($ndoc)
    {
        $this->nroDocumento = $ndoc;
    }
    public function setTipoDocumento($tipodoc)
    {
        $this->tipoDocumento = $tipodoc;
    }
    //Getters Cliente-Persona
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getNroDocumento()
    {
        return $this->nroDocumento;
    }
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
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
        
        //Inserta en tabla cliente-persona 
        $stmt = $this->conex ->prepare("INSERT INTO persona (nroCliente, nombre, apellido, doc_tipo, doc_num) 
            VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $numC, $this->getNombre(), $this->getApellido(),
            $this->getTipoDocumento(), $this->getNroDocumento());
        $stmt->execute();
        
        //Cerrar instancia
        $stmt->close();
        //Cerrar conexion
        $this->conex ->close();
    }

}

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

}
