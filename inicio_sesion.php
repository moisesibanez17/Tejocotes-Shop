<?php
session_start();
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

$cor = $_POST['correo'];
$con = $_POST['contraseña'];

$fecha_actual = date("Y-m-d H:i:s");

$get_id = $mysqli->prepare("SELECT ID_Cliente FROM contacto_cliente WHERE correo = ? AND contraseña = ?");
$get_id->bind_param("ss", $cor, $con);
$get_id->execute();
$result_id = $get_id->get_result();

if ($result_id) {
    if ($result_id->num_rows > 0) {
        $fila_id = $result_id->fetch_assoc();
        $id_cliente = $fila_id['ID_Cliente'];

        
        $_SESSION['id_cliente'] = $id_cliente;

       
        $alta_orden = $mysqli->query("INSERT INTO orden (ID_Cliente, ID_Empleado, Fecha)
                                      VALUES ('$id_cliente', 1, '$fecha_actual')");

        if ($alta_orden) {
            header("Location: dashboard_clientes.php");
            exit();
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
            echo "Error al insertar en la tabla orden: " . $mysqli->error;
            echo "<br/><input type=\"button\" value=\"Volver\" id=\"botones\" onclick=\"location.href='login.php'\">";
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
        echo "<br/><input type=\"button\" value=\"Volver\" id=\"botones\" onclick=\"location.href='login.php'\">";
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
    echo "Error en la consulta a la base de datos: " . $mysqli->error;

     echo "<br/><input type=\"button\" value=\"Volver\" id=\"botones\" onclick=\"location.href='login.php'\">";
}
$get_id->close();
?>
