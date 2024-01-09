<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="alta_pieza.css">
	<title></title>
</head>
<body>

	<fieldset>Registro de piezas</fieldset>

	<form action="alta_pieza_ocu.php" method="post" enctype="multipart/form-data"> 

		<div id="div_login">

		<div id="div_center">

			<h2>Datos de pieza</h2></br>

			<h5>Nombre</h5>
			<input type="text" name="nombre" id="botones"></br>
			<h5>Precio</h5>
			<input type="number" name="precio" id="botones"></br>
			<h5>Stock</h5>
			<input type="number" name="stock" id="botones"></br>
			<h5>Subir imagen de la pieza</h5>
			<input type="file" name="imagen" id="file-input" accept="image/*">



		</div>

		<div>
			
			<input type="submit" value="Registrar pieza" id="boton"/>
			<h5> - </h5>

		</div>

	</div>
		

	</form>


</body>
</html>