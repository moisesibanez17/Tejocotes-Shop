<?php
session_start();
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$get_id = $mysqli->prepare("SELECT ID_Cliente FROM contacto_cliente WHERE correo = ? AND contraseña = ?");
$get_id->bind_param("ss", $correo, $contraseña);
$get_id->execute();
$result_id = $get_id->get_result();

if ($result_id) {
    if ($result_id->num_rows > 0) {
        $fila_id = $result_id->fetch_assoc();
        $id_cliente = $fila_id['ID_Cliente'];

        $consulta = $mysqli->prepare("SELECT orden_computadora.Cantidad, computadora.Nombre, orden.Fecha
                                    FROM orden
                                    INNER JOIN orden_computadora ON orden.ID = orden_computadora.ID_Orden
                                    INNER JOIN computadora ON orden_computadora.ID_Computadora = computadora.ID
                                    WHERE orden.ID_Cliente = ?");
        $consulta->bind_param("i", $id_cliente);
        $consulta->execute();
        $resultados = $consulta->get_result();

        if ($resultados) {
            if ($resultados->num_rows > 0) {

                echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"show_orden.css\">
                            <title></title>
                        </head>
                        <body>

                        <fieldset id=\"field\"><h1>Tu orden</h1></fieldset>";
                while ($fila = $resultados->fetch_assoc()) {

                    $nombre = $fila['Nombre'];
                   
                    $nombre_img = $nombre . ".png";
                    echo "

                        <div id=\"div_center\">
                        <h3>Producto</h3>
                        {$fila['Nombre']}<br/>
                        <img src=\"resources/$nombre_img\" widht = \" 150 \" height = \" 150 \"><br/><br/>
                        <h3>Cantidad</h3>
                        {$fila['Cantidad']}<br/>
                        <h3>Fecha</h3>
                        {$fila['Fecha']}<br/>

                        </div>
                    ";

                }

                echo"
                        <br/><input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Volver\" onclick=\"location.href='dashboard_clientes.php'\">
                    ";
            } else {

                echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"show_orden.css\">
                            <title></title>
                        </head>
                        <body>

                        <fieldset id=\"field\"><h1>Tu orden</h1></fieldset>";
                echo "No se encontraron resultados.";
            }

            $resultados->free();
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

                        <fieldset id=\"field\"><h1>Tu orden</h1></fieldset>";
            echo "Error en la consulta a la base de datos";
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

                        <fieldset id=\"field\"><h1>Tu orden</h1></fieldset>";
        echo "El correo o la contraseña no coinciden.";
    }
} else {
    echo "Error en la consulta a la base de datos: " . $mysqli->error;
}

$get_id->close();
?>
