<?php
require_once '../conexion/Conexion.php';
class Persona
{
    // clase que se conecta con la base de datos

    private $conn;
    private $table = 'persona';

    //inicializamos la conexion a la base de datos
    public function __construct()
    {
        $db = new Conexion();
        $this->conn = $db->conectar();
    }

    //metodos o funciones para completar el crud

    public function listarPersona()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $edad)
    {
        $sql = "INSERT INTO {$this->table} (nombre, edad) VALUES (:nombre, :edad)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nombre' => $nombre,
            ':edad' => $edad
        ]);
    }

    public function actualizar($id, $nombre, $edad)
    {
        $sql = "UPDATE {$this->table} SET nombre = :nombre, edad = :edad WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':edad' => $edad
        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
