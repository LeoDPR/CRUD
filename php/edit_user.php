<?php

include("connection.php");
include("mv_img.php");

$con = connection();

$id_autor = $_POST["id_autor"];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$descripcion = $_POST['descripcion'];
$img_autor_name = $_FILES['img_autor']['name'];

$sql = "UPDATE autores SET nombre='$name', apellido='$lastname', descripcion='$descripcion', imagen_autor='$img_autor_name' WHERE id_autor='$id_autor'";
$query = mysqli_query($con, $sql);

//Esta funcion carga la imagen que el usuario suba al CRUD y la mueve a la carpeta del proyecto del sitio web.
move_img_file_autor();

if ($query) {
    Header("Location: ../index.php");
} else {
    die("Error en la consulta: " . mysqli_error($con));
}

?>