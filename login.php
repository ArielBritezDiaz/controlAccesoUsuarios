<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciar.css">

    <!-- Title font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sen&display=swap" rel="stylesheet">

    <!-- Input font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <title>Login</title>
</head>
<body>
    <div class="container">    
        <div class="leftImage">
        </div>
        <div class="login">
        <img src="logor&b.svg" class="logo">
        <p class="title">Iniciar sesión</p>
        <form action=" " method="post" class="formu">
            <div class="input-container">
                <input type="text" placeholder="Usuario" required name="usuario" pattern=".{8,}">
                <i class="fa-solid fa-user" style="color: #cc0000;"></i>
            </div>
            <div class="input-container">
                <input type="password" placeholder="Contraseña" required name="contrasenia" pattern=".{8,}">
                <i class="fa-solid fa-lock" style="color: #cc0000;"></i>
            </div>
            <a href="recuperar.php?rec" class="recuperar">Olvide mi contraseña</a>
            <input type="submit" value="Iniciar sesión" class="enviar" name="envio">
        </form>
            <a href="form_registro.html" class="registrar">¿No tienes cuenta? Registrate</a>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['envio'])){
    session_start();
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $sql = "SELECT * FROM usuarios WHERE nbr_u = '$usuario' AND token_u =  1";
    $consulta = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($consulta) > 0){
        $registro = mysqli_fetch_assoc($consulta);
        if(password_verify($contrasenia, $registro['Pass_u'])){
            $_SESSION['usuario'] = $usuario;
            header('location:inicio.php');
            echo $_SESSION['usuario'];
        }
        else{
            echo 'Contraseña incorrecta';
            session_destroy();
        }
    }
    else{
        echo 'El usuario no existe';
        session_destroy();
    }
}
?>