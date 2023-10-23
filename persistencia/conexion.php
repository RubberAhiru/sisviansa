<?php

class BaseDeDatos{

    public static function conectar(){ //introducir el password en el 3er parametro!!
                        //(host, usuario, password, base de datos)
        $db = new mysqli("192.168.2.209/phpmyadmin", "rubberahiru", "", "rubber_ahiru");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}

?>