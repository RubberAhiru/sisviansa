<?php

include_once('cliente.php');


class Persona extends Cliente
{
    //Propiedades
    protected $nombre;
    protected $apellido;
    protected $nroDocumento;
    protected $tipoDocumento;

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


}