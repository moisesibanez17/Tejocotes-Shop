<?php
$mysqli = new mysqli("localhost", "root", "", "tejocotes_pc_shop");
if ($mysqli->connect_errno){
    echo "Fallo la conexion con MySQL: (" . $mysqli_errno . ") " . $mysqli->connect_error;
}

?>