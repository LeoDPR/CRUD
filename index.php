<?php
include("./php/connection.php");
$con = connection();

$sql = "SELECT * FROM autores";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/style.css?v=1" rel="stylesheet">
    <title>CRUD</title>
</head>

<body>
    <main id="main">
        <aside>
            <button class="menu-button" onclick="mostrar_agregarAutor()">Agregar Autor</button>
            <button class="menu-button"
                onclick="mostrar_registrarLibro(); mostrar_ocultar_formulario('form__libros', 'autor_id_libros');">Registrar
                Libro</button>
            <button class="menu-button"
                onclick="mostrar_registrarArticulo(); mostrar_ocultar_formulario('form__articulos', 'autor_id_articulos');">Registrar
                Artículo</button>
            <button class="menu-button"
                onclick="mostrar_registrarInvestigacion(); mostrar_ocultar_formulario('form__investigaciones', 'autor_id_investigaciones');">Registrar
                Investigación</button>
            <button class="menu-button"
                onclick="mostrar_registrarEvento(); mostrar_ocultar_formulario('form__eventos', 'autor_id_eventos');">Registrar
                Evento</button>
        </aside>
        <!-- Agregar autor-->
        <div id="agregar__autor" class="">
            <h1>Agregar autor</h1>
            <div class="section-form">
                <form action="./php/insert_user.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Nombre" class="form__autor">
                    <input type="text" name="lastname" placeholder="Apellido" class="form__autor">
                    <textarea type="text" name="descripcion" placeholder="Descripcion" class="form__autor"></textarea>
                    <label for="imagen" class="form__autor">Imagen:</label>
                    <input type="file" name="img_autor" class="form__autor">
                    <label for="miembro">¿Es miembro?</label>
                    <select name="miembro">
                        <option value="1">Si</option>
                        <option selected value="0">No</option>
                    </select>
                    <input type="submit" value="Agregar" class="form__autor">
                </form>
            </div>
            <div class="section-table">
                <h2>Autores registrados</h2>
                <table class="form__autor">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Descripcion</th>
                            <th>Miembro</th>
                            <th>Imagen</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                            <tr>
                                <td>
                                    <?= $row['id_autor'] ?>
                                </td>
                                <td>
                                    <?= $row['nombre'] ?>
                                </td>
                                <td>
                                    <?= $row['apellido'] ?>
                                </td>
                                <td>
                                    <?= $row['descripcion'] ?>
                                </td>
                                <td>
                                    <?= $row['miembro'] ?>
                                </td>
                                <td>
                                    <img class="autor-img"
                                        src="http://localhost/SSP-PROJECT/images/miembros/<?= $row['imagen_autor'] ?>"
                                        alt="Imagen del autor">
                                </td>
                                <td><a href="./php/update.php?id_autor=<?= $row['id_autor'] ?>"
                                        class="section-table--edit">Editar</a>
                                </td>
                                <td><a href="./php/delete_user.php?id_autor=<?= $row['id_autor'] ?>"
                                        class="section-table--delete">Eliminar</a></th>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Registrar articulo-->
        <div id="registrar__articulo" class="hidden">
            <h1>Registrar articulo</h1>
            <form action="./php/insert_article.php" method="POST" class="section-form" enctype="multipart/form-data">
                <div id="autores-container-form__articulos">
                    <select name="autor" id="autor_id_articulos"
                        onchange="mostrar_ocultar_formulario('form__articulos', 'autor_id_articulos')"
                        class="form__articulos">
                        <option value="0" selected>--Seleccione un autor</option>
                        <?php include 'views/recuperar_autores.php'; ?>
                    </select>
                </div>

                <button class="form__articulos" type="button"
                    onclick="agregarAutor('form__articulos', 'autor_id_articulos')">Agregar otro autor</button>

                <input type="text" name="titulo_articulo" placeholder="Titulo del articulo" class="form__articulos">

                <textarea type="text" name="descripcion_articulo" id="textarea-descripcion-articulo"
                    placeholder="Descripcion del articulo" class="form__articulos"></textarea>

                <input type="text" name="categoria_articulo" id="input-category-articulo" placeholder="Categoria"
                    class="form__articulos">

                <label for="fecha_publicacion" class="form__articulos">Fecha de Publicación:</label>
                <input type="date" name="fecha_publicacion_articulo" id="input-publication-date-articulo"
                    class="form__articulos">

                <input type="text" name="url_descarga_articulo" id="input-download-url-articulo"
                    placeholder="URL de descarga del articulo" class="form__articulos">

                <label for="imagen" class="form__articulos">Imagen:</label>
                <input type="file" name="imagen_articulo" id="input-image-url-articulo" class="form__articulos">

                <input type="text" name="issn" id="issn" placeholder="ISSN" class="form__articulos">

                <input type="text" name="fuente-name" id="fuente" placeholder="Nombre de la fuente donde fue publicado"
                    class="form__articulos">

                <label for="select_indizado" class="form__articulos">¿El articulo es indizado?</label>
                <select name="select_indizado" id="select_indizado" class="form__articulos">
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>

                <label for="select_arbitrado" class="form__articulos">¿El articulo es arbitrado?</label>
                <select name="select_arbitrado" id="select_arbitrado" class="form__articulos">
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>
                <input class="form__articulos" id="submit-btn-articulo" type="submit" value="Registrar">

            </form>
        </div>

        <!-- Registrar evento-->
        <div id="registrar__evento" class="hidden">
            <h1>Registrar evento</h1>
            <form action="./php/insert_event.php" method="POST" class="section-form" enctype="multipart/form-data">
                <div id="autores-container-form__eventos">
                    <select name="autor" id="autor_id_eventos"
                        onchange="mostrar_ocultar_formulario('form__eventos', 'autor_id_eventos')"
                        class="form__eventos">
                        <option value="0" selected>--Seleccione un organizador</option>
                        <?php include 'views/recuperar_autores.php'; ?>
                    </select>
                </div>

                <button class="form__eventos" type="button"
                    onclick="agregarAutor('form__eventos', 'autor_id_eventos')">Agregar otro organizador</button>

                <input type="text" name="titulo_evento" placeholder="Titulo del evento" class="form__eventos">

                <textarea type="text" name="descripcion_evento" id="descripcion" placeholder="Descripcion del evento"
                    class="form__eventos"></textarea>

                <input type="text" name="lugar_evento" id="lugar-evento" placeholder="Lugar del evento"
                    class="form__eventos">

                <label for="fecha_inicio_evento" class="form__eventos">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio_evento" id="inicio-date" class="form__eventos">

                <label for="fecha_fin_evento" class="form__eventos">Fecha de finalizacion:</label>
                <input type="date" name="fecha_fin_evento" id="fin-date" class="form__eventos">

                <label for="imagen_evento" class="form__eventos">Imagen:</label>
                <input type="file" name="imagen_evento" id="image-url-evento" class="form__eventos">

                <input class="form__eventos" id="submit-btn-evento" type="submit" value="Registrar">

            </form>

        </div>

        <!-- Registrar libro-->
        <div id="registrar__libro" class="hidden">
            <h1>Registrar libro</h1>
            <form action="./php/insert_book.php" method="POST" class="section-form" enctype="multipart/form-data">
                <div id="autores-container-form__libros">
                    <select name="autor" id="autor_id_libros"
                        onchange="mostrar_ocultar_formulario('form__libros', 'autor_id_libros')" class="form__libros">
                        <option value="0" selected>--Seleccione un autor</option>
                        <?php include 'views/recuperar_autores.php'; ?>
                    </select>
                </div>

                <button class="form__libros" type="button"
                    onclick="agregarAutor('form__libros', 'autor_id_libros')">Agregar otro autor</button>

                <input type="text" name="titulo_libro" placeholder="Titulo del libro" class="form__libros">

                <textarea type="text" name="descripcion_libro" id="descripcion" placeholder="Descripcion del libro"
                    class="form__libros"></textarea>

                <input type="text" name="categoria_libro" id="category" placeholder="Categoria" class="form__libros">

                <label for="fecha_publicacion" class="form__libros">Fecha de Publicación:</label>
                <input type="date" name="fecha_publicacion_libro" id="publication-date" class="form__libros">

                <input type="url" name="url_descarga_libro" id="download-url" placeholder="URL de descarga del libro"
                    class="form__libros">

                <label for="imagen_libro" class="form__libros">Imagen:</label>
                <input type="file" name="imagen_libro" id="image-url" class="form__libros">

                <input type="text" name="isbn_libro" id="isbn" placeholder="ISBN" class="form__libros">

                <input type="text" name="editorial_libro" id="editorial" placeholder="Editorial" class="form__libros">

                <input class="form__libros" id="submit-btn-libro" type="submit" value="Registrar">

            </form>
        </div>

        <!-- Registrar investigacion-->
        <div id="registrar__investigacion" class="hidden">
            <h1>Registrar investigacion</h1>
            <form action="./php/insert_research.php" method="POST" class="section-form" enctype="multipart/form-data">
                <div id="autores-container-form__investigaciones">
                    <select name="autor" id="autor_id_investigaciones"
                        onchange="mostrar_ocultar_formulario('form__investigaciones', 'autor_id_investigaciones')"
                        class="form__investigaciones">
                        <option value="0" selected>--Seleccione un autor</option>
                        <?php include 'views/recuperar_autores.php'; ?>
                    </select>
                </div>
                <button class="form__investigaciones" type="button"
                    onclick="agregarAutor('form__investigaciones', 'autor_id_investigaciones')">Agregar otro
                    autor</button>

                <div id="asociados-container-form__investigaciones">
                    <label id='label-registrar-autor' class="form__investigaciones" class="hidden">Asociados:</label>
                    <button class="form__investigaciones" type="button"
                        onclick="agregarAsociado('form__investigaciones', 'autor_id_investigaciones')">Agregar autor
                        asociado</button>
                </div>

                <input type="text" name="clave_investigacion" placeholder="Clave de la investigacion"
                    class="form__investigaciones">

                <input type="text" name="titulo_investigacion" placeholder="Titulo de la investigacion"
                    class="form__investigaciones">

                <textarea type="text" name="descripcion_investigacion" id="descripcion"
                    placeholder="Descripcion de la investigacion" class="form__investigaciones"></textarea>



                <label for="anio_inicio" class="form__investigaciones">Año de inicio:</label>
                <input type="number" name="anio_inicio_investigacion" id="anio_inicio" class="form__investigaciones"
                    min="1900" max="2100" step="1" value="<?php echo date("Y"); ?>">
                <label for="periodo_inicio" class="form__investigaciones">Periodo de inicio:</label>
                <select name="periodo_inicio_investigacion" id="periodo_inicio" class="form__investigaciones">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <label for="anio_final" class="form__investigaciones">Año de finalizacion:</label>
                <input type="number" name="anio_final_investigacion" id="anio_final" class="form__investigaciones"
                    min="1900" max="2100" step="1" value="<?php echo date("Y"); ?>">
                <label for="periodo_final" class="form__investigaciones">Periodo de finalizacion:</label>
                <select name="periodo_final_investigacion" id="periodo_final" class="form__investigaciones">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <input type="url" name="url_descarga_investigacion" id="download-url" placeholder="URL de Investigacion"
                    class="form__investigaciones">


                <input class="form__investigaciones" id="submit-btn-investigacion" type="submit" value="Registrar">

            </form>

        </div>
    </main>

    <script src="./js/funciones.js"></script>
</body>

</html>