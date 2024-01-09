<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="membresia.css">

    <title>Catalogo de membresias</title>
</head>
<body>

   <fieldset id="field"><h1>Catalogo de membresias</h1></fieldset>

    <form action="alta_membresia.php" method="post">

        <h2>Ingresa tu correo</h2><br>
        <input type="text" name="correo" id="botones"><br>
        <h2>Ingresa tu contraseña</h2><br>
        <input type="text" name="contraseña" id="botones"><br><br>
        
        <div>
            <h1>Membresia diamante</h1>
            <h3>Puntos acumulados por compra: 100</h3>
            <h3>Vigencia: 1 año</h3>

            <img src="resources/diamante.png" widht = " 50" height = " 50 " >

            <input type="submit" name="membresia" value="Diamante" id="botones">

        </div>

        <div>
            <h1>Membresia oro</h1>
            <h3>Puntos acumulados por compra: 50</h3>
            <h3>Vigencia: 6 meses</h3>

            <img src="resources/oro.png" widht = " 50" height = " 50 " >
            <input type="submit" name="membresia" value="Oro" id="botones">

        </div>

        <div>
            <h1>Membresia plata</h1>
            <h3>Puntos acumulados por compra: 10</h3>
            <h3>Vigencia: 3 meses</h3>

            <img src="resources/plata.png" widht = " 50" height = " 50 " >

            <input type="submit" name="membresia" value="Plata" id="botones">

        </div>

        <div>
            <h1>Membresia bronce</h1>
            <h3>Puntos acumulados por compra: 5</h3>
            <h3>Vigencia: 1 mes</h3>

            <img src="resources/bronce.png" widht = " 50" height = " 50 " >

            <input type="submit" name="membresia" value="Bronce" id="botones">

        </div>
    </form>
</body>
</html>
