<?php
include("conexion.php");

if(isset($_POST['registrar'])) {

    $usuarioForm = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

    if(is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $directoryFoto = $_FILES['imagen']['tmp_name'];
        $nameFoto = $_FILES['imagen']['name'];

        move_uploaded_file($dirFoto, $nameFoto);

        $imagen = $nameFoto;

        unlink($nameFoto);
    } else {
        echo "No se subió una imagen";
    }

    $sqlInsert = "INSERT INTO usuarios(Nbr_u, Img_u, Pass_u) VALUES ('$usuarioForm', '$contrasenia', '$imagen')";
    $sqlInsertar = mysqli_query($conexion, $sqlInsert); ? print("Inserción de nuevo usuario realizada con éxito") : print("Error al insertar nuevo usuario");
}

?>