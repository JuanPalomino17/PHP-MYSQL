<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS


$names = (isset($_POST['names'])) ? $_POST['names'] : '';
$date = (isset($_POST['entry_date'])) ? $_POST['entry_date'] : '';
$entry_date = date("Y-m-d", strtotime($date));
$name_work = (isset($_POST['name_work'])) ? $_POST['name_work'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        
            // Insertar el nuevo registro
            $consulta = "INSERT INTO users (names, work_center_id, entry_date) VALUES ('$names', '$name_work', '$entry_date') ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $consulta = "SELECT id, names, work_center_id, entry_date FROM users ORDER BY id DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        break;
    case 2: //modificación
        $consulta = "UPDATE users SET names='$names', work_center_id='$name_work', entry_date='$entry_date' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $consulta = "SELECT id, names, work_center_id, entry_date FROM users WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3://baja
        $consulta = "DELETE FROM users WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = array('success' => true);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
