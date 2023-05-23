<?php
include("connection.php");
$con = connection();
$validar_insert = true;

//Inicia la transaccion
mysqli_begin_transaction($con);

//se obtienen los datos y se almacena en variables
$clave = $_POST['clave_investigacion'];
$titulo = $_POST['titulo_investigacion'];
$p_inicio = $_POST['periodo_inicio_investigacion'];
$anio_inicio = $_POST['anio_inicio_investigacion'];
$p_final = $_POST['periodo_final_investigacion'];
$anio_final = $_POST['anio_final_investigacion'];
$descripcion = $_POST['descripcion_investigacion'];
$url_descarga = $_POST['url_descarga_investigacion'];


//Comienza el proceso de insersion en la tabla investigaciones
$sql = "INSERT INTO investigaciones (clave, titulo, periodo_inicio, anio_inicio, periodo_fin, anio_fin, descripcion, url_descarga)
 VALUES('$clave','$titulo','$p_inicio', '$anio_inicio', '$p_final', '$anio_final','$descripcion', '$url_descarga')";
$query = mysqli_query($con, $sql);
if(!$query){
    $validar_insert = false;
    die("Error en insersion investigaciones: " . mysqli_error($con));
}else{
    echo "Se insertaron en investigaciones \n";
}

//Comienza el proceso de insersion en la tabla investigaciones_autores
//aqui me quede///////////////////////////////////////////////////////////////////////////
$last_id = mysqli_insert_id($con);
//Comienza a insertar el autor principal
$i = 0;
do {
    if($i==0){
        $id_autor = $_POST['autor'];
    }else{
        $id_autor = $_POST['autor' . $i]; 
    }
    $sql2 = "INSERT INTO investigaciones_autores (id_investigacion, id_autor, asociado)
            VALUES ('$last_id', '$id_autor', 0)";
    $query2 = mysqli_query($con, $sql2);
    if(!$query2){
        $validar_insert = false;
        die("Error en la insersion investigaciones_autores $i: " . mysqli_error($con));
    }else {
        echo "Se insertaron en investigaciones_autores\n";
    }
    $i++;
} while (isset($_POST['autor' . $i]));
//Comienza a insertar los autores asociados
$i = 0;
while (isset($_POST['asociado' . $i])) {
    if($i==0){
        $id_autor = $_POST['asociado'];
    }else{
        $id_autor = $_POST['asociado' . $i]; 
    }
    $sql2 = "INSERT INTO investigaciones_autores (id_investigacion, id_autor, asociado)
            VALUES ('$last_id', '$id_autor', 1)";
    $query2 = mysqli_query($con, $sql2);
    if(!$query2){
        $validar_insert = false;
        die("Error en la insersion investigaciones_autores $i: " . mysqli_error($con));
    }else {
        echo "Se insertaron en investigaciones_autores\n";
    }
    $i++;
}


/* Verifica que no haya errores y redirecciona al index */
if($validar_insert){
    mysqli_commit($con);
    mysqli_close($con);
    Header("Location: ../index.php");
}else{
    mysqli_rollback($con);
    echo "Ocurrió un error durante la transacción. Las inserciones se deshicieron.";
}
?>