<?php
session_start();
if(isset($_SESSION['usuario'])){
    echo $_SESSION['usuario'];
    echo '<a href="logout.php">Salir</a>';
}else{
    echo '<a href="login.php">Ingresar</a>';
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/inicio.css">
    <title>Inicio</title>
</head>
<body>
    <footer class="footer">
            <img src="src/images/logo/logoraw.svg" class="logo">
            <div class="info">
                <p>© 2023 CMF engines</p>
                <p>cmfengines@gmail.com</p>
            </div>
    </footer>
</body>
</html>