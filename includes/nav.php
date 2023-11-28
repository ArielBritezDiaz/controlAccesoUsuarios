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
    <header class="container">
    <img src="src/images/logo/logor&w.svg" class="logo">
    <button class="abrir" id="abrir"><i class="fa-solid fa-bars" style="color: #f0f8ff;"></i></button>
    <nav class="nav" id="nav">
            <button class="cerrar" id="cerrar"><i class="fa-solid fa-xmark" style="color: #0c0c0f;"></i></button>
            <ul class="list">
                <!-- Inicio -->
                <li><a href="inicio.php"><i class="fa-solid fa-house" style="color: #f0f8ff;"></i> Inicio</a></li>
                <!-- Carrito de compras -->
                <hr>
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i> Carrito</a></li>
                <!-- CMF 3D -->
                <hr>
                <li><a href="https://marianojsb.github.io/cmf3d.github.io/"><img src="src/images/logo/cmf-3d/resize.svg"> Solicitar pedido</a></li>
                <hr>
                <?php
                if(isset($_SESSION['usuario'])){
                    //Perfil
                    echo '<li>
                    <a href="perfil.php"><i class="fa-solid fa-user" style="color: #f0f8ff;"></i> Perfil</a>
                    </li>
                    <hr>';
                    //Publicar
                    echo '<li>
                    <a href="publicar.php"><i class="fa-solid fa-cloud-arrow-up" style="color: #f0f8ff;"></i> Publicar</a>
                    </li>
                    <hr>';
                    //Salir
                    echo '<li>
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #f0f8ff;"></i> Salir</a>
                    </li>';
                }else{
                    //Registrar
                    echo '<li>
                    <a href="form_registro.html"><i class="fa-solid fa-user-plus" style="color: #f0f8ff;"></i> Registrarse</a>
                    </li>
                    <hr>';
                    //Ingresar
                    echo '<li>
                    <a href="login.php"><i class="fa-solid fa-door-open" style="color: #f0f8ff;"></i> Ingresar</a>
                    </li>';
                    session_destroy();
                }
                ?>
            </ul>
    </nav>
    </header>
    <script src="js/menu.js"></script>
</body>
</html>    