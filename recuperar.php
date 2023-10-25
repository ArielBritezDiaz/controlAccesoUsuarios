<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/recuperar.css">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Title font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sen&display=swap" rel="stylesheet">

    <!-- Input font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    if(isset($_GET['rec'])){
        ?>
        <form action="" method="POST">
        <label for="">Recuperar contraseña</label>
        <div class="inputs">
            <div class="input-container">
                <input type="email" name="email" placeholder="Email" required class="email">
                <i class="fa-solid fa-envelope" style="color: #cc0000;"></i>
            </div>
            <input type="submit" name="recuperar" value="Recuperar" class="send">
        </div>
        </form>
        <?php
    }
    ?>
    

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
            echo '<p class="title">Usuario no existe, debe registrarse</p>';
        }
    }

    if(isset($_GET['send'])){
        if(($_GET['send']==1)){
            echo '<p class="title">Correo enviado, por favor valide</p>';
        }
        else{
            echo '<p class="title">Error al enviar correo de validacion</p>';
        }
    }

    if(isset($_GET['token'])){
            $token2 = $_GET['token'];
            $sql2 = "SELECT * FROM usuarios WHERE token_u = '$token2'";
            $consultaToken = mysqli_query($conexion, $sql2);
            $registro = mysqli_fetch_assoc($consultaToken);
            if(mysqli_num_rows($consultaToken) > 0){
                ?>
                <form action="" method="GET">
                <label for="">Ingrese su nueva contraseña</label>
                <div class="inputs">
                    <div class="input-container">
                        <input type="text" name="contrasenia" placeholder="Contraseña" min="8" class="password" required>
                        <i class="fa-solid fa-lock" style="color: #cc0000;"></i>
                    </div>
                    <input type="submit" name="confirmar" value="Confirmar" class="send">
                </div>
                </form>
                <?php
            }
            if(isset($_GET['confirmar'])){
                    echo "<script>window.location = 'login.php'</script>";
                }
        }
?>
</body>
</html>

