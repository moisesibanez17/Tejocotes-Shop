<?php 
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

// Datos del formulario
$nom = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

//cargar imagen de la pieza
$archivo = $_FILES["imagen"];
$nombreArchivo = $_FILES["imagen"]["name"];
$rutaTemporal = $_FILES["imagen"]["tmp_name"];
$carpetaDestino = "resources/"; // Nombre de la carpeta donde se guardarán las imágenes
$nombreArchivo = $nom . ".png";

$mysqli->autocommit(FALSE);


$al_pieza = $mysqli->query("INSERT INTO pieza (Nombre, Precio, Stock) VALUES ('$nom','$precio','$stock')");

if ($al_pieza) {
   
    $id_pieza = $mysqli->insert_id;

     if ($al_pieza) {
        
        $mysqli->commit();

        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_pieza_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                       ";

                       echo "<div class=\"container\">
                       <div class=\"success\">
                           Registro exitoso de la pieza
                       </div>
                   <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Volver\" onclick=\"location.href='menu_admin.php'\">
                   </div>
               ";
    } else {
        // Revertir los cambios si hubo algún error
        $mysqli->rollback();
        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_pieza_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                        ";
        echo "Hubo un error al insertar los datos.";
    }
} else {
    echo "Error al insertar en la tabla pieza: " . $mysqli->error;
}


$mysqli->close();
?>
