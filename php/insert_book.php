<?php
include("connection.php");
include("mv_img.php");
$con = connection();
$validar_insert = true;

//Inicia la transaccion
mysqli_begin_transaction($con);

//se obtienen los datos y se almacena en variables
$titulo = $_POST['titulo_libro'];
$descripcion = $_POST['descripcion_libro'];
$categoria = $_POST['categoria_libro'];
$fecha_publicacion = $_POST['fecha_publicacion_libro'];
$url_descarga = $_POST['url_descarga_libro'];
$nombreArchivo = $_POST['titulo_libro'] . "." . pathinfo($_FILES['imagen_libro']['name'], PATHINFO_EXTENSION);
$isbn = $_POST['isbn_libro'];
$editorial = $_POST['editorial_libro'];

$resultado = false;
//Una funcion carga la imagen que el usuario suba al CRUD y la mueve a la carpeta del proyecto del sitio web.

if (isset ($_FILES['imagen_libro']) && $_FILES['imagen_libro']['error'] === UPLOAD_ERR_OK) {
    $resultado = move_img_file_book($nombreArchivo);
}else{
    $resultado = true;
    $nombreArchivo = "BookDefault.jpeg";
}

//Comienza el proceso de insersion en la tabla libros
$sql = "INSERT INTO libros (titulo, descripcion, categoria, fecha_publicacion, url_descarga, imagen, editorial, isbn)
 VALUES('$titulo','$descripcion','$categoria','$fecha_publicacion', '$url_descarga', '$nombreArchivo', '$editorial', '$isbn')";
$query = mysqli_query($con, $sql);
if(!$query){
    $validar_insert = false;
    die("Error en insersion libros: " . mysqli_error($con));
}else{
    echo "Se insertaron en libros \n";
}

//Comienza el proceso de insersion en la tabla libros_autores
$last_id = mysqli_insert_id($con);
$i = 0;
do {
    if($i==0){
        $id_autor = $_POST['autor'];
    }else{
        $id_autor = $_POST['autor' . $i]; 
    }
    $sql2 = "INSERT INTO libros_autores (id_libro, id_autor)
            VALUES ('$last_id', '$id_autor')";
    $query2 = mysqli_query($con, $sql2);
    if(!$query2){
        $validar_insert = false;
        die("Error en la insersion libros_autores $i: " . mysqli_error($con));
    }else {
        echo "Se insertaron en libros_autores\n";
    }
    $i++;
} while (isset($_POST['autor' . $i]));


/* Verifica que no haya errores y redirecciona al index */
if($validar_insert && $resultado){
    mysqli_commit($con);
    mysqli_close($con);
    Header("Location: ../index.php");
}elseif (!$resultado) {
    // Si $resultado es falso, entonces algo salió mal al mover la imagen
    mysqli_rollback($con);
    echo "Ocurrió un error al subir la imagen. Las inserciones se deshicieron.";
} else{
    mysqli_rollback($con);
    echo "Ocurrió un error durante la transacción. Las inserciones se deshicieron.";
}
?>