<?php
require_once '../modelos/Persona.php';

$persona = new Persona();

$op = $_GET['op'] ?? '';

switch ($op) {

    case 'listar':
        echo json_encode($persona->listarPersona());
        break;

    case 'guardar':
        $nombre = $_POST['nombre'] ?? '';
        $edad = $_POST['edad'] ?? '';

        $result = $persona->insertar($nombre, $edad);

        echo json_encode([
            "status" => $result,
            "message" => $result ? "Guardado correctamente" : "Error al guardar"
        ]);
        break;

    case 'actualizar':
        $id = $_POST['id'] ?? 0;
        $nombre = $_POST['nombre'] ?? '';
        $edad = $_POST['edad'] ?? '';
        $result = $persona->actualizar($id, $nombre, $edad);

        echo json_encode([
            "status" => $result,
            "message" => $result ? "Actualizado correctamente" : "Error al actualizar"
        ]);
        break;

    case 'eliminar':
        $id = $_POST['id'] ?? 0;

        $result = $persona->eliminar($id);

        echo json_encode([
            "status" => $result,
            "message" => $result ? "Eliminado correctamente" : "Error al eliminar"
        ]);
        break;

    default:
        echo json_encode(["error" => "Operación no válida"]);
        break;
}
