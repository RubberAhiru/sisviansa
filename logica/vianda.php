<?php

include '../persistencia/conexion.php';


class Vianda {
    //Propiedades
    protected $id;
    protected $nombre;
    protected $tiempo;
    protected $precio;
    protected $contenido;
    protected $imagen;
    protected $conex;

    //Constructor
    public function __construct()
    {
        $this->conex = BaseDeDatos::conectar();
    }

    //Setters
    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nom){
        $this->nombre = $nom;
    }
    public function setTiempo($tiem){
        $this->tiempo = $tiem;
    }
    public function setPrecio($prec){
        $this->precio = $prec;
    }
    public function setContenido($cont){
        $this->contenido = $cont;
    }
    public function setImagen($img){
        $this->imagen = $img;
    }

    //Getters
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getTiempo(){
        return $this->tiempo;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getContenido(){
        return $this->contenido;
    }
    public function getImagen(){
        return $this->imagen;
    }

    public function guardar(){
        
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