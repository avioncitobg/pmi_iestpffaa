<?php
require_once './conexion/Conexion.php';
class Persona{
    // clase que se conecta con la base de datos
    public function registrarPersona($data){
        $edad = $data['edad'];
        $nombre = $data['nombre'];

        $sql = "INSERT INTO persona (edad, nombre) values (:edad,:nombre);"
        $smt = $this->$conn->prepare($sql);
        $smt->bindparam(':edad',$edad);
        $smt->bindParam(':nombre',$nombre);

        $smt->execute();
    }
}