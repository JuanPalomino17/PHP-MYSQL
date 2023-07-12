<?php

function conexion(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $bd = "work_centers";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}


?>