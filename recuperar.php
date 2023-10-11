<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method="POST">
    <label for="">Recuperar contraseña</label>
    <input type="email" name="email" placeholder="Email" required>
    <input type="submit" name="recuperar" value="Recuperar">
    </form>
    

<?php
    if(isset($_POST['recuperar'])){
        $email = $_POST['email'];
        $token = time();

        $sql5 = "select * FROM usuarios WHERE email_u = '$email'";
        $validarMail = mysqli_query($conexion, $sql5);

        if(mysqli_num_rows($validarMail) > 0){
            $registro = mysqli_fetch_assoc($validarMail);
            $sql6 = "UPDATE usuarios SET token_u = $token";
            $actualizarToken = mysqli_query($conexion, $sql6);
            ?>
            <script>
            let url_final = 'https://formsubmit.co/ajax/<?php echo $email;?>'
            let mensaje = 'Valide su correo: http://localhost/controlAccesoUsuarios/recuperar.php?token=<?php echo $token;?>'

                $.ajax({
            method: 'POST',
            url: `${url_final}`,
            dataType: 'json',
            accepts: 'application/json',
            data: {
                message: `${mensaje}`
            },
            success: (data) => window.location = 'recuperar.php?send=1',
            error: (err) => window.location = 'recuperar.php?send=0'
            });
            </script> 
            <?php
        }
        else{
            echo 'Usuario no existe, debe registrarse';
        }
    }

    if(isset($_GET['send'])){
        if(($_GET['send']==1)){
            echo 'Correo enviado, por favor valide';
        }
        else{
            echo 'Error al enviar correo de validacion';
        }
    }

    if(isset($_GET['token'])){

        if(isset($_POST['confirmar'])){
            session_start();//The session starts
            $token2 = $_GET['token'];
            $sql2 = "SELECT * FROM usuarios WHERE token_u = '$token2'";
            $consultaToken = mysqli_query($conexion, $sql2);
            $registro = mysqli_fetch_assoc($consultaToken);
            if(mysqli_num_rows($consultaToken) > 0){
                ?>
                <label for="">Ingrese su nueva contraseña</label>
                <input type="password" name="contrasenia" placeholder="Contraseña" required>
                <input type="submit" name="confirmar" value="Confirmar">
                <?php
            }
        }
    }
?>
</body>
</html>

