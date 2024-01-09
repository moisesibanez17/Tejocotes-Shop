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

	<fieldset id="field">

		<h1>Canaima detalles</h1>

	</fieldset>


		<?php
		    
		    $id_computadora = 4; 

		    $cont = 1;
		    $consulta_piezas = $mysqli->query("SELECT pieza.Nombre, pieza.Precio, componentes.Cantidad_Piezas
		                                    FROM componentes
		                                    INNER JOIN pieza ON componentes.ID_Pieza = pieza.ID
		                                    WHERE componentes.ID_Computadora = $id_computadora");

		    if ($consulta_piezas) {
		      
		        if ($consulta_piezas->num_rows > 0) {
		            
		            while ($fila = $consulta_piezas->fetch_assoc()) {
		            	$nombre = $fila['Nombre'];
				        $nombre_php = $nombre . ".php";
				        $nombre_img = $nombre . ".png";
		                if($cont <= 2){
		                $opcion = "

		                <div id=\"div_center\">

		                <h1>{$fila['Nombre']}</h1> 
		        		<h3>Precio</h3>
		        		{$fila['Precio']} 
		        		<h3>Cantidad de piezas</h3>
		        		{$fila['Cantidad_Piezas']} <br/><br/>

		        		<img src=\"resources/$nombre_img\" widht = \" 150 \" height = \" 150 \"><br/><br/>

		                <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Ver detalles\" onclick=\"location.href='$nombre_php'\">

		                </div>
		                ";

		                echo $opcion;
		            }else if($cont <= 4){
		                $opcion = "

		                <div id=\"div_center\">

		                <h1>{$fila['Nombre']}</h1> 
		        		<h3>Precio</h3>
		        		{$fila['Precio']} 
		        		<h3>Cantidad de piezas</h3>
		        		{$fila['Cantidad_Piezas']} <br/><br/>

		        		<img src=\"resources/$nombre_img\" widht = \" 150 \" height = \" 150 \"><br/><br/>

		                <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Ver detalles\" onclick=\"location.href='$nombre_php'\">

		                </div>
		                ";

		                 echo $opcion;

		            }

		                $cont++;
		            }
		           
		        } else {
		            echo "No se encontraron piezas para esta computadora.";
		        }

		        $consulta_piezas->free();
		    } else {
		        echo "Error en la consulta a la base de datos";
		    }

		?>

		<form action="alta_orden_computadora.php" method="post">

		<div> 
		<input type="hidden" name="id_computadora" value="<?php echo $id_computadora; ?>">

		<br/><br/>
		<label for="cantidad_computadora">
            Cantidad
        </label>
        <select name="cantidad_computadora" id="selects">
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

		<br/><br/><input type="submit" value="Agregar a la orden" id="botones" />

		</div>
	</form>	
</body>
</html>