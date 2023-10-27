<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <link rel="stylesheet" href="styles/inicio.css">
    <title>Inicio</title>
    <header class="header">
        <nav class="nav">
            <img src="src/images/logo/logor&w.svg" class="logo">
            <input type="search" name="busqueda" class="search" placeholder="Buscar producto">
            <i class="fa-solid fa-magnifying-glass" style="color: #f0f8ff;"></i>
            <ul class="list">
                <li><a href="#">Mis compras</a></li>
                <?php
            session_start();
            if(isset($_SESSION['usuario'])){
                echo $usuario = $_SESSION['usuario'];
                echo '<li><a href="logout.php">Salir</a></li>';
            }else{
                echo '<li><a href="login.php">Ingresar</a></li>';
                session_destroy();
            }
            ?>
            </ul>
        </nav>
        <div class="slider"></div>
    </header>
</head>
<body>
</body>
</html>