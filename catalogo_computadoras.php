
<?php
include("conexion.php")
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="catalogo_computadoras.css">
	<title></title>
</head>
<form action="" method="post">

        <fieldset id="field">
            <h1>Catalogo computadoras</h1>
        </fieldset>

        
            <?php
			    $consulta = $mysqli->query("SELECT Nombre, Precio, Stock FROM computadora");
			    $cont = 1;

			    if ($consulta) {
			        while (($fila = $consulta->fetch_assoc())) {
			        	$nombre = $fila['Nombre'];
			        	$nombre_php = $nombre . ".php";
			        	$nombre_img = $nombre . ".png";
			        	if($cont <= 2){
			        		 $opcion = "
			        		 <div id=\"div_center\">

				        		 <h1>{$fila['Nombre']}</h1> 
				        		 <h3>Precio</h3>
				        		 {$fila['Precio']} 
				        		 <h3>Stock</h3>
				        		 {$fila['Stock']} <br/><br/>

				        		 <img src=\"resources/$nombre_img\" widht = \" 150 \" height = \" 150 \"><br/><br/>

				        		 <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Ver detalles\" onclick=\"location.href='$nombre_php'\">

			        		 </div>";
			        		  echo $opcion;
			        	}else if($cont <= 4){
			        		 $opcion = "
			        		 <div id=\"div_center\">
			        		 			
				        		 <h1>{$fila['Nombre']}</h1> 
				        		 <h3>Precio</h3>
				        		 {$fila['Precio']} 
				        		 <h3>Stock</h3>
				        		 {$fila['Stock']}<br/><br/>

				        		 <img src=\"resources/$nombre_img\" widht = \" 150 \" height = \" 150 \"><br/><br/>

				        		 <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Ver detalles\" onclick=\"location.href='$nombre_php'\">

			        		 </div>";
			        		  echo $opcion;
			        	}else if($cont <= 5){
			        		 $opcion = "
			        		 <div id=\"div_center\">
			        		 			
				        		 <h1>{$fila['Nombre']}</h1> 
				        		 <h3>Precio</h3>
				        		 {$fila['Precio']} 
				        		 <h3>Stock</h3>
				        		 {$fila['Stock']}<br/><br/>

				        		 <img src=\"resources/$nombre_img\" widht = \" 150 \" height = \" 150 \"><br/><br/>

				        		 <input type=\"button\" id=\"botones\" role=\"link\" name=\"\" value=\"Ver detalles\" onclick=\"location.href='$nombre_php'\">

			        		 </div>";
			        		  echo $opcion;
			        	}
			            $cont++;
			        }
			        $consulta->free();
			    } else {
			        echo "Error en la consulta a la base de datos";
			    }
			?>
        
</body>
</html>