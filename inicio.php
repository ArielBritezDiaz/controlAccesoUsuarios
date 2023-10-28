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
</head>
<body>
    <!-- Categories -->
    <main>
        <!-- Header y nav -->
    <header class="header">
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
        <div class="slider"></div>
    </header>
        <section class="categories" id="categories">
            <article class="cars">
                <p class="autos">utos</p>
                <a href="#"><img src="src/images/categories/cars.png"></a>
            </article>
            <article class="motorbike">
                <p class="motos">otos</p>
                <a href="#"><img src="src/images/categories/motorbike.png"></a>
            </article>
            <article class="formula">
                <p class="form">ormula</p>
                <a href="#"><img src="src/images/categories/formula.png"></a>
            </article>
        </section>
        <footer class="footer">
            <img src="src/images/logo/logor&w.svg" class="logo2">
            <div class="info">
                <p>© 2023 CMF engines</p>
                <p>cmfengines@gmail.com</p>
            </div>
        </footer>
    </main>
</body>
</html>