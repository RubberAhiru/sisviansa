<?php

include '../persistencia/conexion.php';


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
