<?php 
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

// Datos del formulario
$nom = $_POST['primer_nombre'];
$telefono = $_POST['telefono'];

$colonia = $_POST['colonia'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$calle = $_POST['calle'];
$casa = $_POST['casa'];


$mysqli->autocommit(FALSE);


$al_sucursal = $mysqli->query("INSERT INTO sucursal (Telefono, Nombre) VALUES ('$telefono','$nom')");

if ($al_sucursal) {
   
    $id_sucursal = $mysqli->insert_id;

   
    $al_dir_sucursal = $mysqli->query("INSERT INTO dir_sucursal (ID_Sucursal, Colonia, Municipio, Estado, Nom_Calle, Num_Calle)
                                      VALUES ('$id_sucursal', '$colonia', '$municipio', '$estado', '$calle', '$casa')");

     if ($al_dir_sucursal) {
        
        $mysqli->commit();

        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_sucursal_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                       ";

                       echo "<div class=\"container\">
                       <div class=\"success\">
                           Registro exitoso de la sucursal
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
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_sucursal_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                        ";
        echo "Hubo un error al insertar los datos.";
    }
} else {
    echo "Error al insertar en la tabla sucursal: " . $mysqli->error;
}


$mysqli->close();
?>
