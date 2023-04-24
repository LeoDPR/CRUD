<?php
// Establecer la conexión con la base de datos MySQL
include("connection.php");
$con = connection();

// Comprobar si la conexión fue exitosa
if (mysqli_connect_errno()) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
} else {
    // Realizar la consulta para recuperar los nombres de los autores
    $query = "SELECT id_autor, nombre, apellido FROM autores";
    $resultado = mysqli_query($con, $query);

    // Mostrar los nombres de los autores en el menú desplegable
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<option value="' . $fila['id_autor'] . '">' . $fila['nombre'] . " " . $fila['apellido'] . '</option>';
    }

    // Liberar los resultados de la consulta y cerrar la conexión
    mysqli_free_result($resultado);
    mysqli_close($con);
}
?>