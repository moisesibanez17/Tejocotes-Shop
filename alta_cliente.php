<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="alta_cliente.css">
	<title></title>
</head>
<body>

	<fieldset id="field"><h1>Registro de clientes</h1></fieldset>

	<form action="alta_cliente_ocu.php" method="post">

		<div id="div_login">

		<div id="div_center">

			<h2>Datos de identificacion</h2></br>

			<h5>Primer nombre</h5>
			<input type="text" name="primer_nombre" id="botones"></br>
			<h5>Segundo nombre</h5>
			<input type="text" name="segundo_nombre" id="botones"></br>
			<h5>Apellido paterno</h5>
			<input type="text" name="ap_paterno" id="botones"></br>
			<h5>Apellido materno</h5>
			<input type="text" name="ap_materno" id="botones"></br>
			<h5>Fecha de nacimiento</h5>
			<input type="date" name="fec_nac" id="botones"></br>
			<h5>Telefono</h5>
			<input type="text" name="telefono" id="botones"></br>
		</div>

		<div id="div_center">

			<h2>Datos de registro a la pagina</h2></br>

			<h5>Correo</h5>
			<input type="text" name="correo" id="botones"></br>
			<h5>Contraseña</h5>
			<input type="text" name="contraseña" id="botones"></br>
			<h5>Confirmar contraseña</h5>
			<input type="text" name="confirmar" id="botones"></br>

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
			<h5>Numero de casa</h5>
			<input type="number" name="casa" id="botones"></br></br>


		</div>

		<div>
			
			<input type="submit" value="Registrar mi cuenta" id="boton"/>

		</div>
		<h5>Derechos reservados Tejocotes Shop</h5>
		
	</div>
		

	</form>

</body>
</html>