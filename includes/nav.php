<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/nav.css">
    <title>Document</title>
</head>
<body>
    <!-- nav -->
    <nav class="nav">
        <img src="src/images/logo/logor&w.svg" class="logo">
        <div class="input-container">
            <input type="search" name="busqueda" class="search" pattern placeholder="Buscar producto">
            <i class="fa-solid fa-magnifying-glass" style="color: #f0f8ff;"></i>
        </div>
        <ul class="list">
        <li><a href="#categories">Categorias</a></li>
        <?php
        session_start();
        if(isset($_SESSION['usuario'])){
            $usuario = $_SESSION['usuario'];
            echo '<li><a href="#">'.$usuario.'</a></li>';
            echo '<li><a href="#">Mis compras</a></li>';
            echo '<li><a href="logout.php">Salir</a></li>';
        }else{
            echo '<li><a href="form_registro.html">Registrarse</a></li>';
            echo '<li><a href="login.php">Ingresar</a></li>';
            session_destroy();
        }
        ?>
        </ul>
    </nav>
</body>
</html>    