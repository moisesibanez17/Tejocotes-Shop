<?php 
include 'conexion.php';

$mysqli->set_charset("utf8mb4");

// Datos del formulario
$nom = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$id1 = $_POST['id1'];
$cant1 = $_POST['cantidad1'];

$id2 = $_POST['id2'];
$cant2 = $_POST['cantidad2'];

$id3 = $_POST['id3'];
$cant3 = $_POST['cantidad3'];

$id4 = $_POST['id4'];
$cant4 = $_POST['cantidad4'];

$id5 = $_POST['id5'];
$cant5 = $_POST['cantidad5'];




//cargar imagen de la pieza
$archivo = $_FILES["imagen"];
$nombreArchivo = $_FILES["imagen"]["name"];
$rutaTemporal = $_FILES["imagen"]["tmp_name"];
$carpetaDestino = "resources/"; // Nombre de la carpeta donde se guardarán las imágenes
$nombreArchivo = $nom . ".png";

$mysqli->autocommit(FALSE);


$al_com = $mysqli->query("INSERT INTO computadora (Nombre, Precio, Stock) VALUES ('$nom','$precio','$stock')");

if ($al_com) {
   
    $id_com = $mysqli->insert_id;


    // Consultas preparadas para la inserción en la tabla 'componentes'
    $query_componente = "INSERT INTO componentes (ID_Computadora, ID_Pieza, Cantidad_Piezas) VALUES (?, ?, ?)";

    // Preparar la consulta
    $stmt = $mysqli->prepare($query_componente);

    if (!empty($_POST['id1']) && !empty($_POST['cantidad1'])){
        $stmt->bind_param("iii", $id_com, $id1, $cant1);
        $stmt->execute();
    }

    if (!empty($_POST['id2']) && !empty($_POST['cantidad2'])){
        $stmt->bind_param("iii", $id_com, $id2, $cant2);
        $stmt->execute();    
    }

    if (!empty($_POST['id3']) && !empty($_POST['cantidad3'])){
        $stmt->bind_param("iii", $id_com, $id3, $cant3);
        $stmt->execute();  
    }

    if (!empty($_POST['id4']) && !empty($_POST['cantidad4'])){
        $stmt->bind_param("iii", $id_com, $id4, $cant4);
        $stmt->execute();  
    }

    if (!empty($_POST['id5']) && !empty($_POST['cantidad5'])){
        $stmt->bind_param("iii", $id_com, $id5, $cant5);
        $stmt->execute();  
    }


     if ($al_com) {
        
        $mysqli->commit();

        echo "<!DOCTYPE html>
                        <html>
                        <head>
                            <meta charset=\"utf-8\">
                            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_computadora_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                       ";

                       echo "<div class=\"container\">
                       <div class=\"success\">
                           Registro exitoso de la computadora
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
                            <link rel=\"stylesheet\" type=\"text/css\" href=\"alta_computadora_ocu.css\">
                            <title></title>
                        </head>
                        <body>

                        ";
        echo "Hubo un error al insertar los datos.";
    }
} else {
    echo "Error al insertar en la tabla computadora: " . $mysqli->error;
}


$mysqli->close();
?>
