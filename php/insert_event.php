<?php
include("connection.php");
include("mv_img.php");
$con = connection();
$validar_insert = true;

//Inicia la transaccion
mysqli_begin_transaction($con);

//se obtienen los datos y se almacena en variables
$titulo = $_POST['titulo_evento'];
$descripcion = $_POST['descripcion_evento'];
$lugar = $_POST['lugar_evento'];
$fecha_inicio = $_POST['fecha_inicio_evento'];
$fecha_final = $_POST['fecha_fin_evento'];
$nombreArchivo = $_POST['titulo_evento'] . "." . pathinfo($_FILES['imagen_evento']['name'], PATHINFO_EXTENSION);
$resultado = false;



if (isset ($_FILES['imagen_evento']) && $_FILES['imagen_evento']['error'] === UPLOAD_ERR_OK) {
    $resultado = move_img_file_article($nombreArchivo);
}else{
    $resultado = true;
    $nombreArchivo = "EventDefault.jpeg";
}


//Comienza el proceso de insersion en la tabla eventos
$sql = "INSERT INTO eventos (nombre, descripcion, lugar, fecha_inicio, fecha_final, imagen_evento)
 VALUES('$titulo','$descripcion','$lugar','$fecha_inicio', '$fecha_final', '$nombreArchivo')";
$query = mysqli_query($con, $sql);
if(!$query){
    $validar_insert = false;
    die("Error en insersion eventos: " . mysqli_error($con));
}else{
    echo "Se insertaron en eventos \n";
}

//Comienza el proceso de insersion en la tabla eventos_autores
$last_id = mysqli_insert_id($con);
$i = 0;
do {
    if($i==0){
        $id_autor = $_POST['autor'];
    }else{
        $id_autor = $_POST['autor' . $i]; 
    }
    $sql2 = "INSERT INTO eventos_autores (id_evento, id_autor)
            VALUES ('$last_id', '$id_autor')";
    $query2 = mysqli_query($con, $sql2);
    if(!$query2){
        $validar_insert = false;
        die("Error en la insersion eventos_autores $i: " . mysqli_error($con));
    }else {
        echo "Se insertaron en eventos_autores\n";
    }
    $i++;
} while (isset($_POST['autor' . $i]));




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

