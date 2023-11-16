<?php

include_once('../conexion.php');

class clienteDAO
{
    private $conex;
    public function __construct()
    {
        $this->conex = BaseDeDatos::conectar();

    }

    public function login($u, $c){
    //Funcion de login
    //busca al usuario en la base de datos y comprueba si la contrasenia ingresada es correcta
        //prepara una declaracion de consulta SELECT
        $stmt = $this->conex->prepare("SELECT * FROM cliente WHERE email = ?");
        $stmt->bind_param("s", $u);
        //Ejecuta declaracion para hacer consulta
        $stmt->execute();
        //Guarda el resultado
        $result = $stmt->get_result();
        $usuario = $result->fetch_object();
        //Verifica la contrasenia 
        $verify = password_verify($c, $usuario->contrasenia);
        //retorna variable verify como true o false
        return $verify;
    }
    

}