<?php
include("connection.php");
include("mv_img.php");
$con = connection();

$id_autor = null;
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$descripcion = $_POST['descripcion'];
$img_autores = $_FILES['img_autor']['name'];

$sql = "INSERT INTO autores VALUES('$id_autor','$name','$lastname','$descripcion','$img_autores')";
$query = mysqli_query($con, $sql);

//Esta funcion carga la imagen que el usuario suba al CRUD y la mueve a la carpeta del proyecto del sitio web.
move_img_file_autor();

if($query){
    Header("Location: ../index.php");
}else{
    die("Error en la consulta: " . mysqli_error($con));
}

?>