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

}