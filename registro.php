<?php
include("conexion.php");
if(isset($_POST['registrar'])){
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $email = $_POST['email'];
    $token = time();

    $sql = "INSERT INTO usuarios(Nbr_u, Pass_u, email_u, token_u) VALUES ('$usuario', '$contrasenia', '$email', '$token')";
    $consultaInsertar = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <script>
    let url_final = 'https://formsubmit.co/ajax/<?php echo $email;?>'
    let usuario = '<?php echo $usuario;?>'
    let mensaje = 'Valide su correo: http://localhost/controlAcceso/controlAccesoUsuarios/registro.php?token=<?php echo $token;?>'

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
if(isset($_GET['send'])){
    if(($_GET['send']==1)){
        echo 'Correo enviado, por favor valide';
    }
    else{
        echo 'Error al enviar correo de validacion';
    }
}
    if(isset($_GET['token'])){
        $token2 = $_GET['token'];
        $sql2 = "SELECT * FROM usuarios WHERE token_u = '$token2'";
        $consultaToken = mysqli_query($conexion, $sql2);
        if(mysqli_num_rows($consultaToken) > 0){
            $sql3 = "UPDATE usuarios SET token_u = 1 WHERE token_u = '$token2'";
            $consultaValidacion = mysqli_query($conexion, $sql3) ? print('Usuario validado, ya puede iniciar sesion') : print('Token invalido, el token no existe');
        }
    }
?>
</body>
</html>