<?php

class clienteDAO
{
    private $conex;
    public function __construct()
    {
        $this->conex = BaseDeDatos::conectar();

    }

}