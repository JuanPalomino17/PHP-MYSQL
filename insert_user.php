<?php
include("bd/conexion.php");
$con = conexion();
//Insertar un nuevo usuario
if (isset($_POST["submit"])) {
    $id = null;
    $name = $_POST["name"];
    $name_work = $_POST["name_work"];
    $entryDate = $_POST["entry_date"];
  
    $sql = "INSERT INTO users (name, name_work, entry_date) VALUES ('$name', $name_work, '$entryDate')";
  
    if ($con->query($sql) === TRUE) {
      echo "Usuario agregado correctamente";
    } else {
      echo "Error al agregar usuario: " . $con->error;
    }
  }
  //Obtener los usuarios de la base de datos
$sql = "SELECT users.id, users.name, work_centers.name AS work_center_name, users.entry_date FROM users INNER JOIN work_centers ON users.id = name_work.id";
$result = $con->query($sql);

?> 
<!-- <?php
// include("bd/conexion.php");
// $con = Conexion();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'];
//     $name_work = $_POST['name_work'];
//     $entry_Date = $_POST['entry_date'];

//     $sql = "INSERT INTO users (id,name,name_work, entry_date) VALUES ('$id','$name', $name_work, '$entry_Date')";
  
//     if ($conn->query($sql) === TRUE) {
//       echo "Usuario agregado correctamente";
//     } else {
//       echo "Error al agregar usuario: " . $conn->error;
//     }
  
//   // Obtener los usuarios de la base de datos
//     // $sql = "SELECT users.id, users.name, AS work_center_name, users.entry_date FROM users INNER JOIN work_centers ON users.work_center_id = work_centers.id";
//     // $result = $conn->query($sql);
//     // Resto del código para insertar los datos en la base de datos
// }
?> -->
