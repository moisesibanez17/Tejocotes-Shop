<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title></title>
</head>
<body>

	<fieldset id="field"><h1>Inicio de sesion</h1></fieldset>

	<form action="inicio_sesion.php" method="post">

		<div id="div_login">
		<h6>¿Eres nuevo en el sitio? Crea tu cuenta aqui</h6>
		<input type="button" id="botones" role="link" name="" value="Crear cuenta" onclick="location.href='alta_cliente.php'"></br>


		<h2>Ingresa tu correo</h2></br>
		<input type="text" name="correo" id="botones"></br>
		<h2>Ingresa tu contraseña</h2></br>
		<input type="text" name="contraseña" id="botones"></br></br>


		<input type="submit" value="Iniciar sesion" id="botones" />

		</div>

		<div id="img_login">
		<img src="resources/logo.png" widht = " 700" height = " 700 " >
		</div>
	</form>

</body>
</html>