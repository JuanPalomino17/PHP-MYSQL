<?php
include("bd/conexion.php");
$con = Conexion();

$name = $_POST['name'];
$work_center_id = $_POST['work_center_id'];
$name_work = $_POST['name_work'];
$entry_date = $_POST['entry_date'];

// Preparar y ejecutar la consulta para insertar en la tabla users
$sql_users = "INSERT INTO users (name, entry_date) VALUES (?, ?)";
$stmt_users = $conexion->prepare($sql_users);
$stmt_users->bind_param("ss", $name, $entry_date);
$stmt_users->execute();

// Obtener el ID insertado en la tabla users
$user_id = $conexion->insert_id;

// Preparar y ejecutar la consulta para insertar en la tabla name_works
$sql_name_works = "INSERT INTO name_works (name_work, user_id) VALUES (?, ?)";
$stmt_name_works = $conexion->prepare($sql_name_works);
$stmt_name_works->bind_param("si", $name_work, $user_id);
$stmt_name_works->execute();

// Verificar si se insertaron correctamente los datos
if ($stmt_users->affected_rows > 0 && $stmt_name_works->affected_rows > 0) {
    echo "Los datos se han insertado correctamente en ambas tablas.";
} else {
    echo "Error al insertar los datos.";
}

// Cerrar las conexiones y liberar recursos
$stmt_users->close();
$stmt_name_works->close();
$conexion->close();
?>
