<?php 
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

// Datos del formulario
$primer_nom = $_POST['primer_nombre'];
$segundo_nom = $_POST['segundo_nombre'];
$paterno = $_POST['ap_paterno'];
$materno = $_POST['ap_materno'];
$fec_nac = $_POST['fec_nac'];
$fec_reg = date("Y-m-d H:i:s");
$telefono = $_POST['telefono'];
$sucursal = $_POST['sucursal'];

$colonia = $_POST['colonia'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$calle = $_POST['calle'];
$casa = $_POST['casa'];


$mysqli->autocommit(FALSE);


$al_empleado = $mysqli->query("INSERT INTO empleado (ID_Sucursal, Telefono, Fec_Nac, Fec_Reg) VALUES ('$sucursal','$telefono','$fec_nac', '$fec_reg')");

if ($al_empleado) {
   
    $id_empleado = $mysqli->insert_id;

    
    $al_nom_empleado = $mysqli->query("INSERT INTO nom_empleado (ID_Empleado, Primer_Nom, Segundo_Nom, Apellido_Pat, Apellido_Mat)
                                      VALUES ('$id_empleado', '$primer_nom', '$segundo_nom', '$paterno', '$materno')");

   
    $al_dir_empleado = $mysqli->query("INSERT INTO dir_empleado (ID_Empleado, Colonia, Municipio, Estado, Nom_Calle, Num_Casa)
                                      VALUES ('$id_empleado', '$colonia', '$municipio', '$estado', '$calle', '$casa')");

   
    if ($al_nom_empleado && $al_dir_empleado) {
        
        $mysqli->commit();

        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_empleado_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                       ";

                       echo "<div class=\"container\">
                       <div class=\"success\">
                           Registro exitoso del empleado
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
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_empleado_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                        ";
        echo "Hubo un error al insertar los datos.";
    }
} else {
    echo "Error al insertar en la tabla empleado: " . $mysqli->error;
}


$mysqli->close();
?>
