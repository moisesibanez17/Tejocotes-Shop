<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="alta_sucursal.css">
	<title></title>
</head>
<body>

	<fieldset>Registro de sucursal</fieldset>

	<form action="alta_sucursal_ocu.php" method="post">

		<div id="div_login">

		<div id="div_c">

			<h2>Datos de identificacion</h2></br>

			<h5>Nombre</h5>
			<input type="text" name="primer_nombre" id="botones"></br>
			<h5>Telefono</h5>
			<input type="text" name="telefono" id="botones"></br>
		</div>


		<div id="div_center">

			<h2>Datos de ubicacion</h2></br>

			<h5>Colonia</h5>
			<input type="text" name="colonia" id="botones"></br>
			<h5>Municipio</h5>
			<input type="text" name="municipio" id="botones"></br>
			<h5>Estado</h5>
			<input type="text" name="estado" id="botones"></br>
			<h5>Calle</h5>
			<input type="text" name="calle" id="botones"></br>
			<h5>Numero domicilio</h5>
			<input type="number" name="casa" id="botones"></br></br>


		</div>

		<div>
			
			<input type="submit" value="Registrar sucursal" id="botones"/>
			<h5> - </h5>

		</div>
		
	</div>
		

	</form>

</body>
</html>