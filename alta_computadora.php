<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="alta_computadora.css">
	<title></title>
</head>
<body>

	<fieldset>Registro de computadoras</fieldset>

	<form action="alta_computadora_ocu.php" method="post" enctype="multipart/form-data"> 

		<div id="div_login">

			<div id="div_c">

				<h2>Datos de computadora</h2></br>

				<h5>Nombre</h5>
				<input type="text" name="nombre" id="botones"></br>
				<h5>Precio</h5>
				<input type="number" name="precio" id="botones"></br>
				<h5>Stock</h5>
				<input type="number" name="stock" id="botones"></br>
				<h5>Subir imagen de la computadora</h5>
				<input type="file" name="imagen" accept="image/*">


			</div>

			<div id="div_c">
				<h2>Componentes </h2></br>
				<table >
					<tr>
						<th>ID_Pieza</th>
						<th>Cantidad</th>
					</tr>
					<tr>
						<td><input type="text" name="id1" id="botones"></br></td>
						<td><input type="number" name="cantidad1" id="botones"></br></td>
					</tr>
					<tr>
					<td><input type="text" name="id2" id="botones"></br></td>
						<td><input type="number" name="cantidad2" id="botones"></br></td>
					</tr>
					<tr>
					<td><input type="text" name="id3" id="botones"></br></td>
						<td><input type="number" name="cantidad3" id="botones"></br></td>
					</tr>
					<tr>
					<td><input type="text" name="id4" id="botones"></br></td>
						<td><input type="number" name="cantidad4" id="botones"></br></td>
					</tr>
					<tr>
					<td><input type="text" name="id5" id="botones"></br></td>
						<td><input type="number" name="cantidad5" id="botones"></br></td>
					</tr>
				</table>
			</div>

			<div  id="div_c">
				<input type="submit" value="Registrar computadora" id="botones"/>
				<h5> - </h5>
			</div>

		</div>
	</form>


</body>
</html>