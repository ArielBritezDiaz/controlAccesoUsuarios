<?php
session_start();
require_once("conexion.php");
require_once("includes/showArticles.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Home styles -->
    <link rel="stylesheet" href="styles/inicio.css">
    <!-- Nav styles -->
    <link rel="stylesheet" href="styles/components/nav.css">
    <!-- Articles styles -->
    <link rel="stylesheet" href="styles/components/articles.css">
    <!-- Footer styles -->
    <link rel="stylesheet" href="styles/components/footer.css">

    <!-- Searcher cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
    <?php
    include("includes/nav.php");
    ?>
        <div class="slider"></div>
    </header>

    <!-- Categories section -->
    <section class="categories" id="categories">
        <article class="cars">
            <p class="autos">ars</p>
            <a href="inicio.php?categoria=Auto"><img src="src/images/categories/cars.png"></a>
        </article>
        <article class="motorbike">
            <p class="motos">otorbike</p>
            <a href="inicio.php?categoria=Moto"><img src="src/images/categories/motorbike.png"></a>
            </article>
        <article class="formula">
            <p class="form">ormula</p>
            <a href="inicio.php?categoria=Formula"><img src="src/images/categories/formula.png"></a>
        </article>
    </section>
    <p class="featured">Articulos destacados</p>
    <hr>

    <!-- Articles section -->
    <section class="articles" id="stay">

        <div class="con">
        <div class="input-container">
            <input type="text" name="busqueda" class="search" id="search" placeholder="Buscar producto" onkeyup="busqueda($('#search').val());">
            <i class="fa-solid fa-magnifying-glass" style="color: #f0f8ff;"></i>
        </div>
        <?php
        // <!-- Ordenar articulos -->
        if(!isset($_GET['categoria'])){
            echo '
            <a href="inicio.php?asc"><i class="fa-solid fa-sort-down fa-flip-vertical" style="color: #f0f8ff;"></i></a>
            <a href="inicio.php?desc"><i class="fa-solid fa-sort-down" style="color: #f0f8ff;"></i></a>';
        }

        // <!-- Ordenar articulos por categoria -->
        if(isset($_GET['categoria'])){
            $categoria = $_GET['categoria'];
            echo '
            <a href="inicio.php?categoria='.$categoria.'&ascat"><i class="fa-solid fa-sort-down fa-flip-vertical" style="color: #f0f8ff;"></i></a>
            <a href="inicio.php?categoria='.$categoria.'&descat"><i class="fa-solid fa-sort-down" style="color: #f0f8ff;"></i></a>
            <a href="inicio.php?cancel" class="cancel"><i class="fa-solid fa-xmark" style="color: #cc0000;"></i></a>';
            if(isset($_GET['cancel'])){
                header("location : inicio.php");
                exit();
            }
        }
        // <!-- Boton de cancelar ordenamiento -->
        if(isset($_GET['asc']) || isset($_GET['desc'])){
            echo '<a href="inicio.php?cancel" class="cancel"><i class="fa-solid fa-xmark" style="color: #cc0000;"></i></a>';
            if(isset($_GET['cancel'])){
                header("location : inicio.php");
                exit();
            }
        }
        ?>
        </div>
            <!-- Sin ordenamientos -->
            <?php
            if (!isset($_GET['asc']) && !isset($_GET['desc']) && !isset($_GET['categoria'])) {
                echo '<div id="datos_buscador">
                </div>';
            }

            // Ascendente
            if(isset($_GET['asc'])){
            echo '<div class="datos_ordenados">';
            orderAsc();
            echo'
            </div>';
            }
            // Descendente
            if(isset($_GET['desc'])){
            echo '<div class="datos_ordenados">';
            orderDesc();
            echo'
            </div>';
            }
            //Filtro por categoria
            if(isset($_GET['categoria'])) {
                $categoria = $_GET['categoria'];
                echo '<div class="datos_ordenados">';
                if(isset($_GET['ascat'])){
                    orderAscCategorie($categoria);
                } elseif(isset($_GET['descat'])){
                    orderDescCategorie($categoria);
                } else {
                    showCategorie($categoria);
                }
            echo'
            </div>';
                
            }
            ?>

    </section>
    
    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
    <script src="js/buscador.js"></script>
</body>
</html>