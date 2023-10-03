<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <div class="login">
    <img src="Logo.svg" class="logo">
    <form action=" " method="post" class="formu">
        <input type="text" placeholder="usuario" name="usuario">
        <input type="password" placeholder="contraseña" name="contrasenia">
        <input type="submit" value="Enviar" name="envio">
    </form>
    </div>
</head>
<body>
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