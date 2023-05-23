<?php

include("connection.php");
include("mv_img.php");

$con = connection();
$validar_insert = true;

//Inicia la transaccion
mysqli_begin_transaction($con);

//se obtienen los datos y se almacena en variables
$id_autor = null;
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$descripcion = $_POST['descripcion'];
$miembro = $_POST['miembro'];

if (isset ($_FILES['img_autor']) && $_FILES['img_autor']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = $_POST['lastname'] . "." . pathinfo($_FILES['img_autor']['name'], PATHINFO_EXTENSION);
    $result = move_img_file_autor($nombreArchivo);
}else{
    $resultado = true;
    $nombreArchivo = "defaultprofile.png";
}

//Esta funcion carga la imagen que el usuario suba al CRUD y la mueve a la carpeta del proyecto del sitio web.


$sql = "INSERT INTO autores VALUES('$id_autor','$name','$lastname','$descripcion','$nombreArchivo', '$miembro')";
$query = mysqli_query($con, $sql);

if(!$query){
    $validar_insert = false;
    die("Error en la actualizacion de los autores: " . mysqli_error($con));
}else{
    echo "Se actualizaron los autores \n";
}

/* Verifica que no haya errores y redirecciona al index */
if($validar_insert && $resultado){
    mysqli_commit($con);
    mysqli_close($con);
    Header("Location: ../index.php");
}else{
    mysqli_rollback($con);
    echo "Ocurrió un error durante la transacción. Las inserciones se deshicieron.";
}

?>