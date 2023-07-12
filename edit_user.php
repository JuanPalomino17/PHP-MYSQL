<?php

include("bd/conexion.php");
$con = conexion();

$id=$_POST["id"];
$name = $_POST['name'];
$work_center_id = $_POST['work_center_id'];
$entry_date = $_POST['entry_date'];

$sql="UPDATE users SET name='$name', lastname='$lastname', username='$username', password='$password', email='$email' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>