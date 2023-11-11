<?php

include_once('../conexion.php');


class viandaDAO {

    private $conex;
    public function __construct()
    {
        $this->conex = BaseDeDatos::conectar();

    }

    public function listarTodas(){
        //Consulta todos los datos en la tabla vianda
        //con Prepared Statement (Declaracion Preparada)
        $stmt = $this->conex ->prepare("SELECT * FROM vianda ORDER BY nombre");
        $stmt->execute();
        $result = $stmt->get_result();
        
        //Crea array de viandas 
        //y lo llena con todos los elementos que se obtuvieron de la consulta
        $viandas = [];
        while($row = $result->fetch_assoc()){
            $viandas[] = $row;
        }

        //Cerrar instancia
        $stmt->close();
        //Cerrar conexion
        $this->conex ->close();

        //var_dump($viandas);
        return $viandas;
    }
}
?>