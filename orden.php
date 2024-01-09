<?php
include("conexion.php")
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="orden.css">
	<title></title>
</head>
<body>

	<fieldset id="field"><h1>Tu orden</h1></fieldset>

	<form action="show_orden.php" method="post">

		<div id="div_login">
		<h2>Ingresa tu correo</h2><br>
        <input type="text" name="correo" id="botones"><br>
        <h2>Ingresa tu contraseña</h2><br>
        <input type="text" name="contraseña" id="botones"><br><br>

        <input type="submit" name="membresia" value="Ver mi orden" id="botones">

        </div>

	</form>
</body>
</html>