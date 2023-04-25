<?php

function move_img_file_autor()
{
    if (isset($_FILES['img_autor']) && $_FILES['img_autor']['error'] == UPLOAD_ERR_OK) {
        
        
        $rutaArchivo = 'C:\\xampp\\htdocs\\SSP-PROJECT\\images\\miembros\\' . $_POST['lastname'] . "_IMAGEN." . pathinfo($_FILES['img_autor']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['img_autor']['tmp_name'], $rutaArchivo)) {
            echo 'El archivo se ha subido correctamente';
            return true;
        } else {
            switch ($_FILES['img_autor']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo 'El archivo subido excede la directiva upload_max_filesize en php.ini';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo 'El archivo se subió parcialmente';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo 'No se ha subido ningún archivo';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo 'Falta una carpeta temporal. Intente establecer la directiva upload_tmp_dir en php.ini';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo 'Fallo al escribir en el disco. Verifique los permisos de escritura en la carpeta de destino';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo 'Una extensión PHP detuvo la carga de archivos. Verifique si hay extensiones habilitadas en php.ini';
                    break;
                default:
                    echo 'Se ha producido un error al subir el archivo';
                    break;
            }
            return false;
        }

    }
}

function move_img_file_book()
{
    if (isset($_FILES['imagen_libro']) && $_FILES['imagen_libro']['error'] == UPLOAD_ERR_OK) {
        
        $rutaArchivo = 'C:\\xampp\\htdocs\\SSP-PROJECT\\images\\trabajos\\libros\\' . $_POST['titulo_libro'] . "_IMAGEN." . pathinfo($_FILES['imagen_libro']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['imagen_libro']['tmp_name'], $rutaArchivo)) {
            return true;
        } else {
            switch ($_FILES['imagen_libro']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo 'El archivo subido excede la directiva upload_max_filesize en php.ini';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo 'El archivo se subió parcialmente';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo 'No se ha subido ningún archivo';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo 'Falta una carpeta temporal. Intente establecer la directiva upload_tmp_dir en php.ini';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo 'Fallo al escribir en el disco. Verifique los permisos de escritura en la carpeta de destino';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo 'Una extensión PHP detuvo la carga de archivos. Verifique si hay extensiones habilitadas en php.ini';
                    break;
                default:
                    echo 'Se ha producido un error al subir el archivo';
                    break;
            }
            return false;
        }
    } else {
        echo 'No se ha seleccionado ningún archivo';
        return false;
    }
}

function move_img_file_article()
{
    if (isset($_FILES['imagen_articulo']) && $_FILES['imagen_articulo']['error'] == UPLOAD_ERR_OK) {
        
        $rutaArchivo = '..\\SSP-PROJECT\\trabajos\\articulos\\images\\' . $_POST['titulo_articulo'] . "_IMAGEN." . pathinfo($_FILES['imagen_articulo']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['imagen_articulo']['tmp_name'], $rutaArchivo)) {
            return true;
        } else {
            switch ($_FILES['imagen_articulo']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo 'El archivo subido excede la directiva upload_max_filesize en php.ini';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo 'El archivo se subió parcialmente';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo 'No se ha subido ningún archivo';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo 'Falta una carpeta temporal. Intente establecer la directiva upload_tmp_dir en php.ini';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo 'Fallo al escribir en el disco. Verifique los permisos de escritura en la carpeta de destino';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo 'Una extensión PHP detuvo la carga de archivos. Verifique si hay extensiones habilitadas en php.ini';
                    break;
                default:
                    echo 'Se ha producido un error al subir el archivo';
                    break;
            }
            return false;
        }
    } else {
        echo 'No se ha seleccionado ningún archivo';
        return true;
    }
}

function move_img_file_event()
{
    if (isset($_FILES['imagen_evento']) && $_FILES['imagen_evento']['error'] == UPLOAD_ERR_OK) {

        $rutaArchivo = 'C:\\xampp\\htdocs\\SSP-PROJECT\\images\\eventos\\' . $_POST['titulo_evento'] . "_IMAGEN." . pathinfo($_FILES['imagen_evento']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['imagen_evento']['tmp_name'], $rutaArchivo)) {
            return true;
        } else {
            switch ($_FILES['imagen_evento']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo 'El archivo subido excede la directiva upload_max_filesize en php.ini';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo 'El archivo subido excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo 'El archivo se subió parcialmente';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo 'No se ha subido ningún archivo';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo 'Falta una carpeta temporal. Intente establecer la directiva upload_tmp_dir en php.ini';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo 'Fallo al escribir en el disco. Verifique los permisos de escritura en la carpeta de destino';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo 'Una extensión PHP detuvo la carga de archivos. Verifique si hay extensiones habilitadas en php.ini';
                    break;
                default:
                    echo 'Se ha producido un error al subir el archivo';
                    break;
            }
            return false;
        }
    } else {
        echo 'No se ha seleccionado ningún archivo';
        return true;
    }
}



?>