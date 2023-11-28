<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/registrarPasos.css">

    <!-- Title font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sen&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>registrar</title>
</head>
<body>
    <?php
    if(isset($_POST['registrar'])){
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $email = $_POST['email'];
        $token = time();

        $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

        $sql4 = "SELECT * FROM usuarios WHERE email_u = '$email'";
        $consultaMail = mysqli_query($conexion, $sql4);
        $registroMail = mysqli_fetch_assoc($consultaMail);

        if(mysqli_num_rows($consultaMail) > 0){
            echo '<a href="form_registro.html"><img src="src/images/backArrow.svg" class="arrow"></a>';
            echo '<p class="title">Ya existe un usuario registrado con este correo</p>';
        }
        else{
        $sql = "INSERT INTO usuarios(Nbr_u, Pass_u, email_u, token_u) VALUES ('$usuario', '$contrasenia', '$email', '$token')";
        $consultaInsertar = mysqli_query($conexion, $sql);
        
    ?>
    <script>
    let url_final = 'https://formsubmit.co/ajax/<?php echo $email;?>'
    let usuario = '<?php echo $usuario;?>'
    let mensaje = 'Valide su correo: http://localhost/controlAccesoUsuarios/registro.php?token=<?php echo $token;?>'

        $.ajax({
    method: 'POST',
    url: `${url_final}`,
    dataType: 'json',
    accepts: 'application/json',
    data: {
        name: `${usuario}`,
        message: `${mensaje}`
    },
    success: (data) => window.location = 'registro.php?send=1',
    error: (err) => window.location = 'registro.php?send=0'
    });
    </script>

<?php }
    }
if(isset($_GET['send'])){
    if(($_GET['send']==1)){
        echo '<p class="title">Correo enviado, por favor valide</p>';
    }
    else{
        echo '<a href="form_registro.html"><img src="src/images/backArrow.svg"></a>';
        echo '<p class="title">Error al enviar correo de validacion</p>';
    }
}
    if(isset($_GET['token'])){
        session_start();//The session starts
        $token2 = $_GET['token'];
        $sql2 = "SELECT * FROM usuarios WHERE token_u = '$token2'";
        $consultaToken = mysqli_query($conexion, $sql2);
        $registro = mysqli_fetch_assoc($consultaToken);
        if(mysqli_num_rows($consultaToken) > 0){
            $sql3 = "UPDATE usuarios SET token_u = 1 WHERE token_u = '$token2'";
            $consultaValidacion = mysqli_query($conexion, $sql3) ? print('Usuario validado, ya puede iniciar sesion') : print('Token invalido, el token no existe');
            $_SESSION['usuario'] = $registro['Nbr_u'];
            $_SESSION['ID_u'] = $registro['ID_u'];
            header('location:inicio.php');
        }
        else{
            echo '<p class="title">El usuario no existe, debe registrarse</p>';
            session_destroy();
        }
    }
?>

</body>
</html>