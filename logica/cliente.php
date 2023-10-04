<?php

/*include("../persistencia/conexion.php");
$conex = conectar();*/

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

    //Constructor
    protected function __construct()
    {

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
        //inserta datos a la tabla cliente
        $sql = "INSERT INTO cliente VALUES('{$this->getEmail()}','{$this->getContrasenia()}',
        ','{$this->getCalle()}','{$this->getNumCalle()}','{$this->getBarrio()}');" ;
        mysqli_query($conex, $sql);

        //obtiene el nroCliente asignado
        $sql = "SELECT nroCliente FROM cliente WHERE email = '{$this->getEmail()}';" ;
        $res = mysqli_query($conex, $sql);

        //guarda el nroCliente en la variable
        $nroCli = mysqli_fetch_array($res);
        
        //inserta numero de telefono
        $sql = "INSERT INTO telefono VALUES('$nroCli', '{$this->getTel()}');" ;
        mysqli_query($conex, $sql);

        //inserta datos a la tabla persona
        $sql = "INSERT INTO persona VALUES ('$nroCli','{$this->getNombre()}','{$this->getApellido()}', 
        '{$this->getNroDocumento()}', '{$this->getTipoDocumento()}');" ;
        mysqli_query($conex, $sql);

        $conex->close();
    }

    //test
    public function ver()
    {
        var_dump(get_object_vars($this));

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
