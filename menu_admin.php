<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="menu_admin.css">
	<title></title>
</head>
<body>

	<fieldset id="field"><h1>Menu administracion</h1></fieldset>

	<form action="menu_admin.php" method="post">

	<div id="div_login">

		<input type="button" id="boton" role="link" name="" value="Alta empleado" onclick="location.href='alta_empleado.php'"></br>
		<input type="button" id="boton" role="link" name="" value="Alta sucursal" onclick="location.href='alta_sucursal.php'"></br>
		<input type="button" id="boton" role="link" name="" value="Alta piezas" onclick="location.href='alta_pieza.php'"></br>
		<input type="button" id="boton" role="link" name="" value="Alta computadoras" onclick="location.href='alta_computadora.php'"></br>

		</div>

		<div id="img_login">
		<img src="resources/logo.png" widht = " 700" height = " 700 " >
		</div>
	</form>

</body>
</html>