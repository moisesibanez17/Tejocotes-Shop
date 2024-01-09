<?php
include("conexion.php")
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bdd_style.css">
    <title></title>
</head>
<body>

    <fieldset id="field"><h1>NVIDIA 3050ti detalles</h1></fieldset>

        <form action="alta_orden_pieza.php" method="post">

            <?php
            
            $id_pieza = 5; 

           
            $consulta = $mysqli->query("SELECT * FROM pieza WHERE ID = $id_pieza");

            if ($consulta) {
                if ($consulta->num_rows > 0) {
                    while ($fila = $consulta->fetch_assoc()) {
                        $nombre = $fila['Nombre'];
                        $nombre_php = $nombre . ".php";
                        $nombre_img = $nombre . ".png";

                        echo "

                        <div id=\"div_center\">

                            <h1>{$fila['Nombre']}</h1> 
                            <h3>Precio</h3>
                            {$fila['Precio']} 
                            <h3>Stock</h3>
                            {$fila['Stock']} <br/><br/>

                            <img src=\"resources/$nombre_img\" widht = \" 150 \" height = \" 150 \"><br/><br/>

                            
                            </div>
                            ";
                    }
                } else {
                    echo "No se encontró la pieza con el ID especificado.";
                }

                $consulta->free();
            } else {
                echo "Error en la consulta a la base de datos";
            }

            ?>

            <div>
                
                    Una de las tarjetas graficas mas poderosas que existen, necesitas procesar graficos hiper realistas o quieres jugar tus juegos con una calidad nunca antes vista, esta tarjeta grafica es para ti
            </div>

            <input type="hidden" name="id_pieza" value="<?php echo $id_pieza; ?>">

            <br/><br/>
            <label for="cantidad_pieza">
                Cantidad
            </label>
           <select name="cantidad_pieza" id="selects">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>  
            </select>

           <h2>Ingresa tu correo</h2></br>
           <input type="text" name="correo" id="botones"></br>
           <h2>Ingresa tu contraseña</h2></br>
           <input type="text" name="contraseña" id="botones"></br></br>

           <br/><br/><input type="submit" value="Agregar a la orden" id="botones"/>

        </form>


</body>
</html>