<?php
session_start();
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $get_id = $mysqli->prepare("SELECT ID_Cliente FROM contacto_cliente WHERE correo = ? AND contraseña = ?");
    $get_id->bind_param("ss", $correo, $contraseña);
    $get_id->execute();
    $result_id = $get_id->get_result();

    if ($result_id && $result_id->num_rows > 0) {
        $fila_id = $result_id->fetch_assoc();
        $id_cliente = $fila_id['ID_Cliente'];

        // Obtener el ID de la orden relacionada con el cliente
        $get_order_id = $mysqli->prepare("SELECT ID FROM orden WHERE ID_Cliente = ?");
        $get_order_id->bind_param("i", $id_cliente);
        $get_order_id->execute();
        $result_order_id = $get_order_id->get_result();

        if ($result_order_id && $result_order_id->num_rows > 0) {
            $fila_order_id = $result_order_id->fetch_assoc();
            $id_orden = $fila_order_id['ID'];

            $id_computadora = $_POST['id_computadora'];
            $cantidad_restar = $_POST['cantidad_computadora'];

            // Resto del código para verificar el stock y realizar el alta en la orden de computadora
            $consulta_stock = $mysqli->query("SELECT Stock FROM computadora WHERE ID = $id_computadora");

            if ($consulta_stock && $consulta_stock->num_rows > 0) {
                $fila_stock = $consulta_stock->fetch_assoc();
                $stock_actual = $fila_stock['Stock'];

                $nuevo_stock = $stock_actual - $cantidad_restar;

                if ($nuevo_stock >= 0) {
                    $actualizar_stock = $mysqli->query("UPDATE computadora SET Stock = $nuevo_stock WHERE ID = $id_computadora");

                    if ($actualizar_stock) {
                        $query = "INSERT INTO orden_computadora (id_orden, id_computadora, cantidad) " .
                            "VALUES ('$id_orden', '$id_computadora', '$cantidad_restar')";

                        if ($mysqli->query($query)) {

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
                            echo "Tu orden se completó con éxito";
                            echo "<br/><input type=\"button\" value=\"Volver\" id=\"botones\" onclick=\"location.href='catalogo_computadoras.php'\">";
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
                            echo "Fallo el alta a la orden: (" . $mysqli->errno . ") " . $mysqli->error;
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
                        echo "Error al actualizar el stock";
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
                    echo "Stock insuficiente para tu orden";
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
                echo "No se encontró la computadora con el ID especificado";
            }

            $consulta_stock->free();
            $get_order_id->free_result();
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
            echo "No se encontró una orden para el cliente especificado";
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
        echo "El correo o la contraseña no coinciden.";
    }

    $get_id->close();
}
?>
