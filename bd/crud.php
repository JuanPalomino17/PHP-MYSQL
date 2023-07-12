<?php
include_once '../database/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS

$entry_date = (isset($_POST['entry_date'])) ? $_POST['entry_date'] : '';
$work_center = ( ($_POST['name_work'])) ? $_POST['name_work'] : '';
$work_center_id = (isset($_POST['work_center_id'])) ? $_POST['work_center_id'] : '';
$names = (isset($_POST['name'])) ? $_POST['name'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        // Verificar si el nombre de la persona ya existe
        $consultaExistencia = "SELECT  FROM work_centers WHERE names = '$names'";
        $resultadoExistencia = $conexion->prepare($consultaExistencia);
        $resultadoExistencia->execute();
        $existencia = $resultadoExistencia->fetch(PDO::FETCH_ASSOC);
        if ($existencia) {
            // El nombre ya existe, mostrar mensaje de error
            $data = array('error' => 'La cédula ya existe. Por favor, ingresa una cédula válida.');
        } else {
            // Insertar el nuevo registro
            $consulta = "INSERT INTO personas (id,name, work_center_id, name_work, entry_date) VALUES ('$name', '$work_center_id', '$name_work', '$entry_date') ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $consulta = "SELECT id,name, work_center_id, name_work, entry_date FROM users ORDER BY id DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;
    case 2: //modificación
        $consulta = "UPDATE personas SET cedula='$cedula', nombre='$nombre', apellido='$apellido', direccion='$direccion', barrio='$barrio', telefono='$telefono' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $consulta = "SELECT id, cedula, nombre, apellido, direccion, barrio, telefono FROM personas WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3://baja
        $consulta = "DELETE FROM personas WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = array('success' => true);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
