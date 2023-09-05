<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "control_acceso";

$conexion = mysqli_connect($server, $user, $password, $database) or die ("Error en conexión a DB");
?>