<?php 
    include("connection.php");
    $con=connection();

    $id_autor=$_GET['id_autor'];

    $sql="SELECT * FROM autores WHERE id_autor='$id_autor'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/style.css?v=1" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="section-form">
            <form action="edit_user.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_autor" value="<?= $row['id_autor']?>">
                <input type="text" name="name" placeholder="Nombre" value="<?= $row['nombre']?>">
                <input type="text" name="lastname" placeholder="Apellidos" value="<?= $row['apellido']?>">
                <input type="text" name="descripcion" placeholder="descripcion" value="<?= $row['descripcion']?>">
                <input type="file" name="img_autor" placeholder="img_autor" value="<?= $row['imagen_autor']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>