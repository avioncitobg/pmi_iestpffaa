<?php
require_once './conexion/Conexion.php';
class Persona{
    // clase que se conecta con la base de datos

    private $conn;
    private $table = 'persona';

    private $id;
    private $nombre;
    private $edad;

    //inicializamos la conexion a la base de datos
    public function __construct()
    {
        $db = new Conexion();
        $this->conn = $db->conectar();
    }

    //metodos o funciones para completar el crud

    public function listarPersona(){
        $sql = "SELECT * FROM {$this->table}";
        $smt = $this->conn->prepare($sql);
        $smt->execute();
        return $smt;
    }
}