<?php
$current_url = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/components/nav.css">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Nav font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <!-- nav -->
    <nav class="nav">
        <img src="src/images/logo/logor&w.svg" class="logo">
        <div class="input-container">
            <input type="search" name="busqueda" class="search" id="search" placeholder="Buscar producto" onkeyup="buscar_prod($('#buscar').val());>
            <i class="fa-solid fa-magnifying-glass" style="color: #f0f8ff;"></i>
        </div>
        <ul class="list">
        <?php
        session_start();
        if(isset($_SESSION['usuario'])){
            $usuario = $_SESSION['usuario'];

            if(strpos($current_url, 'inicio.php') != false){
                echo '<li>
                <a href="perfil.php"><i class="fa-regular fa-user" style="color: #f0f8ff;"></i></a>
                </li>';
            }
            else if(strpos($current_url, 'perfil.php') != false){
                echo '<li><a href="inicio.php">Inicio</a></li>';
            }
            echo '<li><a href="#categories">Categorias</a></li>';
            echo '<li>
            <a href="carrito.php"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i></a>
            </li>';
            if(strpos($current_url, 'publicar.php') != false){
                echo '<li>
                <a href="perfil.php"><i class="fa-regular fa-user" style="color: #f0f8ff;"></i></a>
                </li>';
                echo '<li><a href="inicio.php">Inicio</a></li>';
            }
            else{
                echo '<li><a href="publicar.php">Publicar</a></li>';
            }
            echo '<li><a href="logout.php">Salir</a></li>';
        }else{
            echo '<li>
            <a href="login.php"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i></a>
            </li>';
            echo '<li><a href="form_registro.html">Registrarse</a></li>';
            echo '<li><a href="login.php">Ingresar</a></li>';
            session_destroy();
        }
        ?>
        </ul>
    </nav>
</body>
</html>    