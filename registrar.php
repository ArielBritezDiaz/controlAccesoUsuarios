<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "control_acceso";

$conexion = require("./conexion.php");

if(isset($_POST['registrar'])) {

    $usuarioForm = $_POST[''];
    $contrasenia = $_POST[''];

    $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

    if(is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $directoryFoto = $_FILES['imagen']['tmp_name'];
        $nameFoto = $_FILES['imagen']['name'];

        move_uploaded_file($dirFoto, $nameFoto);

        $imagen = redimensionarImg($nameFoto, 100, 100);

        unlink($nameFoto);
    } else {
        $imagen = "";
    }

    $sqlInsert = "INSERT INTO usuarios(Nbr_u, Img_u, Pass_u) VALUES ('$usuarioForm', '$contrasenia', '$imagen')";
    $sqlInsertar = mysqli_query($conexion, $sqlInsert); ? print("Inserción de nuevo usuario realizada con éxito") : print("Error al insertar nuevo usuario");
}

?>