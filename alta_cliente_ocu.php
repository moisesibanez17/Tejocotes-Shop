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

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$telefono = $_POST['telefono'];

$colonia = $_POST['colonia'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$calle = $_POST['calle'];
$casa = $_POST['casa'];


$mysqli->autocommit(FALSE);


$al_cliente = $mysqli->query("INSERT INTO cliente (Fec_Nac, Fec_Reg) VALUES ('$fec_nac', '$fec_reg')");

if ($al_cliente) {
   
    $id_cliente = $mysqli->insert_id;

    
    $al_nom_cliente = $mysqli->query("INSERT INTO nom_cliente (ID_Cliente, Primer_Nom, Segundo_Nom, Apellido_Pat, Apellido_Mat)
                                      VALUES ('$id_cliente', '$primer_nom', '$segundo_nom', '$paterno', '$materno')");

   
    $al_contacto_cliente = $mysqli->query("INSERT INTO contacto_cliente (ID_Cliente, Correo, Contraseña, Telefono)
                                           VALUES ('$id_cliente', '$correo', '$contraseña', '$telefono')");

   
    $al_dir_cliente = $mysqli->query("INSERT INTO dir_cliente (ID_Cliente, Colonia, Municipio, Estado, Nom_Calle, Num_Casa)
                                      VALUES ('$id_cliente', '$colonia', '$municipio', '$estado', '$calle', '$casa')");

   
    if ($al_nom_cliente && $al_contacto_cliente && $al_dir_cliente) {
        
        $mysqli->commit();

        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_cliente_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                       ";

        echo "<div class=\"container\">
                <div class=\"success\">
                    Registro exitoso de la cuenta
                </div>
            <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Volver\" onclick=\"location.href='login.php'\">
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
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_cliente_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                        ";
        echo "Hubo un error al insertar los datos.";
    }
} else {
    echo "Error al insertar en la tabla cliente: " . $mysqli->error;
}

$mysqli->close();
?>
