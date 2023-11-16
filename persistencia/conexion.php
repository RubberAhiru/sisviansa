<?php


class BaseDeDatos{

    public static function conectar(){
                        //(host, usuario, password, base de datos)
        $db = new mysqli("192.168.2.209/phpmyadmin", "rubberahiru", "patitodehule", "rubber_ahiru");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}

/*class BaseDeDatos
{

    public static function conectar()
    { 
        //(host, usuario, password, base de datos)
        $db = new mysqli("localhost", "root", "", "Rubber_Ahiru");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}*/

?>