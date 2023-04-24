<?php
include("connection.php");
include("mv_img.php");
$con = connection();
$validar_insert = true;

//Inicia la transaccion
mysqli_begin_transaction($con);

//se obtienen los datos y se almacena en variables
$titulo = $_POST['titulo_articulo'];
$descripcion = $_POST['descripcion_articulo'];
$categoria = $_POST['categoria_articulo'];
$fecha_publicacion = $_POST['fecha_publicacion_articulo'];
$url_descarga = $_POST['url_descarga_articulo'];
$img_autor_name = $_FILES['imagen_articulo']['name'];
$issn = $_POST['issn'];
$fuente = $_POST['fuente-name'];
$indizado = false;
$arbitrado = false;

if ($_POST['select_indizado'] == 1){
    $indizado = true;
}
if ($_POST['select_arbitrado'] == 1){
    $arbitrado = true;
}


//Comienza el proceso de insersion en la tabla libros
$sql = "INSERT INTO articulos (nombre, descripcion, categoria, fecha_publicacion, url_descarga, imagen, fuente_publicacion, issn, indizado, arbitrado)
 VALUES('$titulo','$descripcion','$categoria','$fecha_publicacion', '$url_descarga', '$img_autor_name', '$fuente', '$issn', '$indizado', '$arbitrado')";
$query = mysqli_query($con, $sql);
if (!$query) {
    $validar_insert = false;
    die("Error en insersion libros: " . mysqli_error($con));
} else {
    echo "Se insertaron en articulos";
}

//Comienza el proceso de insersion en la tabla articulos_autores
$last_id = mysqli_insert_id($con);
$i = 0;
do {
    if ($i == 0) {
        $id_autor = $_POST['autor'];
    } else {
        $id_autor = $_POST['autor' . $i];
    }
    $sql2 = "INSERT INTO articulos_autores (id_articulo, id_autor)
        VALUES ('$last_id', '$id_autor')";
    $query2 = mysqli_query($con, $sql2);
    if (!$query2) {
        $validar_insert = false;
        die("Error en la insersion articulos_autores $i: " . mysqli_error($con));
    } else {
        echo "Se insertaron en articulos_autores";
    }
    $i++;
} while (isset($_POST['autor' . $i]));

//Una funcion carga la imagen que el usuario suba al CRUD y la mueve a la carpeta del proyecto del sitio web.
$resultado = move_img_file_article();

/* Verifica que no haya errores y redirecciona al index */
if ($validar_insert && $resultado) {
    mysqli_commit($con);
    mysqli_close($con);
    Header("Location: ../index.php");
}else{
    mysqli_rollback($con);
    echo "Ocurrió un error durante la transacción. Las inserciones se deshicieron.";
}
?>