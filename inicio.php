<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Nav font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/inicio.css">
    <title>Inicio</title>
    <!-- Header y nav -->
    <header class="header">
        <nav class="nav">
            <img src="src/images/logo/logor&w.svg" class="logo">
            <div class="input-container">
                <input type="search" name="busqueda" class="search" placeholder="Buscar producto">
                <i class="fa-solid fa-magnifying-glass" style="color: #f0f8ff;"></i>
            </div>
            <ul class="list">
                <li><a href="#categories">Categorias</a></li>
                <li><a href="#">Mis compras</a></li>
                <?php
            session_start();
            if(isset($_SESSION['usuario'])){
                $usuario = $_SESSION['usuario'];
                echo '<li><a href="#">'.$usuario.'</a></li>';
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
    <!-- Categories -->
    <main>
        <section class="categories" id="categories">

        </section>
    </main>
</head>
<body>
</body>
</html>