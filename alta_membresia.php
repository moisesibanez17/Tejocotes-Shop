<?php
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$membresia = $_POST['membresia'];
$fec_ini = date("Y-m-d H:i:s");

$get_id_cliente = $mysqli->prepare("SELECT ID_Cliente FROM contacto_cliente WHERE correo = ? AND contraseña = ?");
$get_id_cliente->bind_param("ss", $correo, $contraseña);
$get_id_cliente->execute();
$result_id_cliente = $get_id_cliente->get_result();

if ($result_id_cliente->num_rows > 0) {
    $fila_id_cliente = $result_id_cliente->fetch_assoc();
    $id_cliente = $fila_id_cliente['ID_Cliente'];

    // Definir la fecha de vencimiento según el tipo de membresía
    switch ($membresia) {
        case 'Diamante':
            $fec_ven = date("Y-m-d H:i:s", strtotime($fec_ini . " +1 year"));
            break;
        case 'Oro':
            $fec_ven = date("Y-m-d H:i:s", strtotime($fec_ini . " +6 months"));
            break;
        case 'Plata':
            $fec_ven = date("Y-m-d H:i:s", strtotime($fec_ini . " +3 months"));
            break;
        case 'Bronce':
            $fec_ven = date("Y-m-d H:i:s", strtotime($fec_ini . " +1 month"));
            break;
        default:
            // Manejo de otro tipo de membresía (si es necesario)
            break;
    }

    // Insertar la membresía en la tabla membresia
    $al_membresia = $mysqli->query("INSERT INTO membresia (ID_Cliente, Nombre, Fec_Inicio, Fec_Vencimiento)
                                    VALUES ('$id_cliente', '$membresia', '$fec_ini', '$fec_ven')");

    if ($al_membresia) {

        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_membresia.css\">
                            <title></title>
                        </head>
                        <body>

                        ";

                        echo"<div class=\"container\">
        <div class=\"success\">
        Has registrado tu membresia $membresia correctamente disfruta de tus beneficios
        </div>
    <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Volver\" onclick=\"location.href='dashboard_clientes.php'\">
    </div>
    ";
    } else {
        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"bdd_style.css\">
                            <title></title>
                        </head>
                        <body>

                        ";
        echo "Hubo un error al registrar la membresía.";
    }
} else {
    echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"bdd_style.css\">
                            <title></title>
                        </head>
                        <body>

                        ";
    echo "No se encontró un cliente con el correo y contraseña proporcionados.";
}

$get_id_cliente->close();
?>
