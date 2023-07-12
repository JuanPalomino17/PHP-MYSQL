<?php 
    include("bd/conexion.php");
    $con=conexion();

    $id=$_GET['id'];

    $sql="SELECT * FROM users WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit_user.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="text" name="name" placeholder="Nombre" value="<?= $row['name']?>">
                <input type="text" name="work_center_id" placeholder="work_center_id" value="<?= $row['work_center_id']?>">
                <input type="text" name="entry_date" placeholder="entry_date" value="<?= $row['entry_date']?>">
                <input type="text" name="name_work" placeholder="name_work" value="<?= $row['name_work']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>