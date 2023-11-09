<?php
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
            <a href="#"><img src="src/images/categories/cars.png"></a>
        </article>
        <article class="motorbike">
            <p class="motos">otorbike</p>
            <a href="#"><img src="src/images/categories/motorbike.png"></a>
            </article>
        <article class="formula">
            <p class="form">ormula</p>
            <a href="#"><img src="src/images/categories/formula.png"></a>
        </article>
    </section>
    <p class="featured">Articulos destacados</p>
    <hr>

    <!-- Articles section -->
    <section class="articles">
    <?php
    showArticles();
    ?>
    </section>
    
    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>