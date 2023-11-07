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
    <!-- Articles styles -->
    <link rel="stylesheet" href="styles/components/articles.css">
    <title>Inicio</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    include("includes/header.php");
    ?>
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
    <p class="featured">Articulos destacados</p>
    <hr>
    <section class="articles">
    <?php
    showArticles();
    ?>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>